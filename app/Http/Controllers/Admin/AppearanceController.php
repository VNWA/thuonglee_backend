<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appearance;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    //

    public function logoLoadData()
    {
        $app = Appearance::where('type', 'logo')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'success'], 200);
    }
    public function logoUpdate(Request $request)
    {
        $data = [];
        $data['logo_full'] = $request->logoFull;
        $data['logo_icon'] = $request->logoIcon;
        $data['favicon'] = $request->favicon;

        $app = Appearance::where('type', 'logo')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'success'], 200);

    }



    public function profileLoadData()
    {
        $app = Appearance::where('type', 'profile')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'success'], 200);
    }
    public function profileUpdate(Request $request)
    {
        $data = $request->all();
        $app = Appearance::where('type', 'profile')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Profile Success'], 200);

    }








    public function homePageLoadData()
    {
        $app = Appearance::where('type', 'home_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Home Page Success'], 200);
    }
    public function homePageUpdate(Request $request)
    {
        $data = $request->all();


        $app = Appearance::where('type', 'home_page')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Data Home Page Success'], 200);

    }



    public function galleryPageLoadData()
    {
        $app = Appearance::where('type', 'gallery_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Gallery Page Success'], 200);
    }
    public function galleryPageUpdate(Request $request)
    {
        $data = $request->all();


        $app = Appearance::where('type', 'gallery_page')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Data Gallery Page Success'], 200);

    }





    public function servicesPageLoadData()
    {
        $app = Appearance::where('type', 'services_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Services Page Success'], 200);
    }
    public function servicesPageUpdate(Request $request)
    {
        $data = $request->all();


        $app = Appearance::where('type', 'services_page')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Data Services Page Success'], 200);

    }






    public function coursesPageLoadData()
    {
        $app = Appearance::where('type', 'courses_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data Courses Page Success'], 200);
    }
    public function coursesPageUpdate(Request $request)
    {
        $data = $request->all();


        $app = Appearance::where('type', 'courses_page')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Data Courses Page Success'], 200);

    }



    public function aboutPageLoadData()
    {
        $app = Appearance::where('type', 'about_page')->first();
        $data = $app->value;
        return response()->json(['data' => $data, 'message' => 'Load Data About Page Success'], 200);
    }
    public function aboutPageUpdate(Request $request)
    {
        $data = $request->all();


        $app = Appearance::where('type', 'about_page')->first();
        $app->value = $data;
        $app->save();
        return response()->json(['message' => 'Update Data About Page Success'], 200);

    }







}