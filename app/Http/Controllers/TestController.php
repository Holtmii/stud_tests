<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id): View
    {
        if(\session()->get('first') != null)
            \session()->put('first', 2);
        else
            \session()->put('first', 1);

        $subject = DB::table('subjects')->where('id', $id)->get();

        $questions = DB::table('questions')->where('id_subject', $id)->get();
        $countQuestions = sizeof($questions);

        $answers = DB::table('answers')->get();

        $first_questions = DB::table('questions')->where('id_subject', $id)->where('complexity', 1)->get();

        $var = rand(0, sizeof($first_questions) - 1);
        $first_question = $first_questions[$var];

        if (\session()->get('solved') == null)
            \session()->push('solved', $first_question->id);

        if (sizeof($questions) != sizeof(\session()->get('solved'))){
            do {
                $var = rand(0, sizeof($questions) - 1);
                $question = $questions[$var];
            }
            while(in_array($question->id, \session()->get('solved')));

            if(\session()->get('first') != null && \session()->get('first') > 1)
                \session()->push('solved', $question->id);
        } else
            return View('test.index', compact(['subject', 'answers', 'request', 'countQuestions']));

        if (\session()->get('first') != null &&\session()->get('first') > 1)
            return View('test.index', compact(['subject', 'question', 'answers', 'request', 'countQuestions']));
        else
            return View('test.index', compact(['subject', 'answers', 'first_question', 'request', 'countQuestions']));
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
        //
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
