<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appearance;
use App\Models\Contact;
use Illuminate\Http\Request;
use Validator;

class ClientController extends Controller
{
    public function loadDataLayout()
    {

        $appLogo = Appearance::where('type', 'logo')->first();
        $appLogo = $appLogo->value;

        $appProfile = Appearance::where('type', 'profile')->first();
        $appProfile = $appProfile->value;


        return response()->json([
            'data' => [
                'logo_full' => $appLogo['logo_full'],
                'logo_icon' => $appLogo['logo_icon'],
                'favicon' => $appLogo['favicon'],
                'profile' => $appProfile
            ],
            'message' => 'Success'
        ], 200);
    }


    public function loadDataHomePage()
    {
        $app = Appearance::where('type', 'home_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Home Page Success'], 200);
    }
    public function loadDataGalleryPage()
    {
        $app = Appearance::where('type', 'gallery_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Gallery Page Success'], 200);
    }
    public function loadDataServicesPage()
    {
        $app = Appearance::where('type', 'services_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Courses Page Success'], 200);
    }
    public function loadDataCoursesPage()
    {
        $app = Appearance::where('type', 'courses_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Courses Page Success'], 200);
    }
    public function loadDataAboutPage()
    {
        $app = Appearance::where('type', 'about_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data About Page Success'], 200);
    }


    public function sendContact(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'service' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string|max:500',
        ]);

        // Nếu có lỗi, trả về response
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Lưu dữ liệu vào database
        $contact = Contact::create([
            'name' => $request->name,
            'service' => $request->service,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your contact has been submitted successfully.',
            'data' => $contact
        ], 200);
    }

}