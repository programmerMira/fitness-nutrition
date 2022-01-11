<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainPage;

class MainPageController extends Controller
{
    function index(Request $request)
    {
        $data = MainPage::all();
        return view('index');//->with(compact('data'));
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
