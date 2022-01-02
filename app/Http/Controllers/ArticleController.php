<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ArticleController extends Controller
{
    function index(Request $request, $id)
    {
        if($id==null)
            return redirect()->route('question');
        $question = Question::find($id)->first();
        //dd($question->name);
        if($question!=NULL)
            return view('article')->with('question', $question);
        return redirect()->route('question');
    }
}
