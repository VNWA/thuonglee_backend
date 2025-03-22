<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class MediaController extends Controller
{
    private function getFileType($extension)
    {
        $types = [
            'image' => ['jpg', 'jpeg', 'png', 'webp', 'avif', 'gif', 'bmp'],
            'video' => ['mp4', 'avi', 'mov', 'mkv'],
            'document' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'],
        ];

        foreach ($types as $type => $extensions) {
            if (in_array(strtolower($extension), $extensions)) {
                return $type;
            }
        }

        return 'other';
    }

    public function loadData(Request $request)
    {
        $items = [];
        $basePath = $request->basePath ?? '/';
        if (!Storage::exists($basePath)) {
            return response()->json(['message' => 'Base path does not exist.'], 400);
        }

        // Lấy danh sách thư mục
        $directories = Storage::directories($basePath);
        foreach ($directories as $directory) {
            $items[] = [
                'name' => basename($directory),
                'type' => 'dir',
                'path' => $directory,
            ];
        }

        // Lấy danh sách các tệp tin
        $files = Storage::files($basePath);
        foreach ($files as $file) {
            if (in_array(basename($file), ['.gitignore', '.DS_Store', 'Thumbs.db'])) {
                continue;
            }

            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $fileType = $this->getFileType($extension);

            $items[] = [
                'name' => basename($file),
                'type' => $fileType,
                'path' => $file,
                'size' => Storage::size($file),
                'mimeType' => Storage::mimeType($file),
                'lastModified' => date('Y-m-d H:i:s', Storage::lastModified($file)),

            ];
        }

        return response()->json(['data' => $items], 200);
    }

    public function createDirectory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'basePath' => 'nullable|string',
        ]);

        $directoryName = $request->input('name');
        $basePath = $request->input('basePath', '');
        $fullPath = rtrim($basePath, '/') . '/' . $directoryName;

        if (Storage::exists($fullPath)) {
            return response()->json(['message' => 'Folder already exists.'], 409);
        }

        try {
            Storage::makeDirectory($fullPath);
            return response()->json(['message' => 'Create Folder Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function uploadFiles(Request $request)
    {
        // Validate đầu vào
        $request->validate([
            'files.*' => 'required|file|max:20480',
            'basePath' => 'nullable|string'
        ]);

        $uploadedFiles = [];
        $basePath = $request->input('basePath', '');

        try {
            // Lặp qua từng file và xử lý
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $basePath . '/' . $fileName;

                // Thêm tiền tố nếu file đã tồn tại
                if (\Storage::exists($filePath)) {
                    $prefix = "new_"; // Tiền tố để thêm vào trước tên file
                    $fileName = $prefix . $fileName;
                    $filePath = $basePath . '/' . $fileName;

                    // Lặp nếu vẫn còn trùng
                    $counter = 1;
                    while (\Storage::exists($filePath)) {
                        $fileName = $prefix . "({$counter})_" . $file->getClientOriginalName();
                        $filePath = $basePath . '/' . $fileName;
                        $counter++;
                    }
                }

                // Lưu file vào thư mục
                $storedPath = $file->storeAs($basePath, $fileName);
                $uploadedFiles[] = $storedPath;
            }

            // Trả về phản hồi thành công
            return response()->json([
                'message' => 'Files uploaded successfully',
            ], 200);
        } catch (\Exception $e) {
            // Trả về phản hồi khi có lỗi
            return response()->json([
                'message' => 'Files upload failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function rename(Request $request)
    {
        $request->validate([
            'currentName' => 'required|string',
            'newName' => 'required|string',
            'type' => 'required|string',
            'path' => 'nullable|string',
        ]);
        $currentName = $request->currentName;
        $newName = $request->newName;
        $path = ($request->path ? '/' . trim($request->path, '/') : '');

        if ($request->type === 'file') {
            $fileInfo = pathinfo($currentName);
            $fileExtension = isset($fileInfo['extension']) ? '.' . $fileInfo['extension'] : '';
            $newFileName = $newName . $fileExtension;

            $oldPath = $path . '/' . $currentName;
            $newPath = $path . '/' . $newFileName;

            if (!Storage::disk('public')->exists($oldPath)) {
                return response()->json(['message' => 'File không tồn tại.'], 404);
            }

            if (Storage::disk('public')->exists($newPath)) {
                return response()->json(['message' => 'Tên file đã tồn tại.'], 409);
            }

            Storage::disk('public')->move($oldPath, $newPath);
        } else {
            $oldPath = $path . '/' . $currentName;
            $newPath = $path . '/' . $newName;

            if (!Storage::disk('public')->exists($oldPath)) {
                return response()->json(['message' => 'Thư mục không tồn tại.'], 404);
            }

            if (Storage::disk('public')->exists($newPath)) {
                return response()->json(['message' => 'Tên thư mục đã tồn tại.'], 409);
            }

            Storage::disk('public')->move($oldPath, $newPath);
        }

        return response()->json(['message' => 'Đổi tên thành công.'], 200);
    }
    public function delete(Request $request)
    {
        $request->validate([
            'data' => 'required|array',

        ]);

        try {
            foreach ($request->data as $value) {
                $itemPath = $value['path'];

                if (!Storage::disk('public')->exists($itemPath)) {
                    return response()->json(['message' => 'Tệp hoặc thư mục không tồn tại: ' . $value['name']], 404);
                }

                if ($value['type'] === 'dir') {
                    Storage::disk('public')->deleteDirectory($itemPath);
                } else {
                    Storage::disk('public')->delete($itemPath);
                }
            }

            return response()->json(['type' => 'success', 'message' => 'Xóa file, thư mục thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => 'Lỗi khi xóa: ' . $e->getMessage()], 500);
        }
    }

}