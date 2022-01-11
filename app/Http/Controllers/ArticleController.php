<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Topic;

class ArticleController extends Controller
{
    function index(Request $request, $id)
    {
        if($id==null)
            return redirect()->route('question');
        $question = Question::find($id);
        if($question!=NULL)
            return view('article')->with('question', $question);
        return redirect()->route('question');
    }
    
    function adminArticle(Request $request, $id)
    {
        $article = Question::find($id);
        return view('admin.dashboard.question.questionShow')->with('article', $article);
    }

    function adminShowArticle(Request $request, $id)
    {
        $article = Question::find($id);
        $topic = Topic::find($article->topic_id);
        $topics = Topic::where('id','!=',$article->topic_id)->get();
        return view('admin.dashboard.question.questionEditForm')->with(compact('article','topic','topics'));
    }

    function adminEditArticle(Request $request, $id)
    {
        $topic_id = $request->topic_id;
        $name = $request->name;
        $answer = $request->answer;

        if($id!=null && $topic_id!=null && $name!=null && $answer!=null){
            /*$topic_id = Topic::where('name','=',$topic)->first()->id;
            if($topic_id==null){
                $new_topic = new Topic();
                $new_topic->name = $topic;
                $new_topic->save();
                $topic_id = Topic::where('name','=',$topic)->first()->id;
            }*/
            //dd($topic_id,$name,$answer);
            Question::whereId($id)->update([
                'topic_id' => $topic_id,
                'name' => $name,
                'answer' => $answer
            ]);
        }
        return redirect()->route('adminQuestion');
    }

    function adminAddView(Request $request){
        $topics = Topic::all();
        return view('admin.dashboard.question.questionAddForm')->with(compact('topics'));
    }

    function adminAddArticle(Request $request)
    {
        $topic_id = $request->topic_id;
        $name = $request->name;
        $answer = $request->answer;

        if($topic_id!=null && $name!=null && $answer!=null){
            //dd($topic_id,$name,$answer);
            Question::create([
                'topic_id' => $topic_id,
                'name' => $name,
                'answer' => $answer
            ]);
        }
        return redirect()->route('adminQuestion');
    }

    function adminArticles(Request $request){
        $articles = Question::with('topic')->get();
        $topics = Topic::all();
        return view('admin.dashboard.question.questionList')->with(compact('articles','topics'));
    }

    function adminDeleteArticle(Request $request, $id)
    {
        Question::where('id','=',$id)->delete();
        return redirect()->route('adminQuestion');
    }
}
