<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function loadData(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $sortBy = $request->get('sortBy', 'created_at');
        $sortType = $request->get('sortType', 'desc');

        // Lấy dữ liệu từ bảng Contact và phân trang
        $data = Contact::orderBy($sortBy, $sortType)->paginate($perPage);

        return response()->json($data, 200);
    }
    public function view($id)
    {
        $data = Contact::find($id);
        if ($data) {
            $data->is_view = 1;
            $data->save();
        }
        return response()->json($data, 200);

    }

    public function delete(Request $request)
    {
        $ids = $request->input('ids', []); // Lấy danh sách ID từ request

        if (empty($ids)) {
            return response()->json(['message' => 'Không có ID nào để xóa'], 400);
        }

        Contact::whereIn('id', $ids)->delete();

        return response()->json([
            'message' => 'Xóa liên hệ thành công',
            'deleted_ids' => $ids
        ], 200);
    }


}
