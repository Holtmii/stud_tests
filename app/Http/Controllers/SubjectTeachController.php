<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectTeachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->query('subject') != null)
            $subjects = DB::table('subjects')->where('id_discipline', $request->query('subject'))->get();
        else
            $subjects = DB::table('subjects')->where('id_discipline', 1)->get();
        $disciplines = DB::table('disciplines')->get();
        return View('subject_teach.index', compact('subjects'), compact('disciplines'));
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
        $request->query('subject') == null ? $request->merge(["id_discipline"=>"1"]) : $request->merge(["id_discipline"=>$request->query('subject')]);
        Subject::create($request->all());
        return $this->index($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subjects = DB::table('subjects')->where('id_discipline', $id)->get();
        $disciplines = DB::table('disciplines')->get();
        return View('subject_teach.index', compact('subjects'), compact('disciplines'));
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
