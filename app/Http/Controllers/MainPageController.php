<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainPage;

class MainPageController extends Controller
{
    function index(Request $request)
    {
        $main_welcome = MainPage::where('name','=','main_welcome')->first();
        $address_us_if = MainPage::where('name','=','address_us_if')->first();

        return view('index')->with(compact('main_welcome','address_us_if'));
    }

    function adminEditContent(Request $request, $id)
    {
        $name = $request->name;
        $content = $request->content;

        if($name!=null && $content!=null){
            MainPage::whereId($id)->update([
                'name' => $name,
                'content' => $answer
            ]);
        }
        return redirect()->route('adminMagePage');
    }

    function adminMagePage(Request $request)
    {
        $data = MainPage::all();
        return view('admin.dashboard.main.mainList')->with(compact('data'));
    }
}
