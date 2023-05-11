<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): View
    {
        $this->firstQuestion();


        $subject = DB::table('subjects')->where('id', $id)->get();

        $questions = DB::table('questions')->where('id_subject', $id)->get();

        $first_questions = DB::table('questions')->where('id_subject', $id)->where('complexity', 1)->get();
        $var = rand(0, sizeof($first_questions) - 1);
        $first_question = $first_questions[$var];

        $var = rand(0, sizeof($questions) - 1);
        $question = $questions[$var];

        $answers = DB::table('answers')->get();

        if (\request()->get('first') != null &&\request()->get('first') > 1)

            return View('test.index', compact(['subject', 'question', 'answers']));

        else
//            dd(\request()->get('first'));
            return View('test.index', compact(['subject', 'answers', 'first_question']));
    }

    public function firstQuestion(): void
    {
        if (\request()->get('first') == null || \request()->get('first') < 2)
            \request()->merge(['first' => 1]);
        dd(\request()->get('first'));
//            dd(\request()->get('first') == 1)
//        elseif (\request()->get('first') == 1){
//            \request()->merge(['first' => 2]);


//    }
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
