<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $questions = DB::table('questions')->where('id_subject', $id)->get();
//            ->select(DB::raw('questions.*, answers.text_answer as answer_text'))
//            ->leftJoin('answers', 'answers.id_question', '=', 'questions.id')
//            ->get();

        $answers = DB::table('answers')->get();

        return View('question.index',compact(['questions','answers', 'id']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
        Question::create($request->all());

        $question = DB::table('questions')
            ->where('id_subject', $request->id_subject)
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $cnt = 0;
        $digit = "ans1";
        while($request->$digit != null){
            $cnt++;
            $digit = "ans".$cnt;
            $ans = $request->$digit;
            if($ans == null)
                break;
            $right = "ans".$cnt."Right";


            $answer = new Answer();
            $answer->text_answer = $ans;
            $answer->id_question = $question[0]->id;
            if($request->$right != null){
                $answer->right = 1;
            } else $answer->right = 0;

            $answer->save();
        }
        return Redirect('question/'.$request->id_subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
