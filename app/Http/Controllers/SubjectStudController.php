<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubjectStudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        \session()->forget(['first', 'solved']);
        if($request->query('discipline') != null)
            $subjects = DB::table('subjects')
                ->leftJoin('group_disciplines', 'group_disciplines.id_discipline', '=', 'subjects.id_discipline')
                ->where('subjects.id_discipline', $request->query('discipline'))
                ->get();
        else
            $subjects = DB::table('subjects')
                ->leftJoin('group_disciplines', 'group_disciplines.id_discipline', '=', 'subjects.id_discipline')
                ->get();

        $disciplines = DB::table('disciplines')->get();
        $group = DB::table('groups')->where('id', Auth::user()->id_group)->get();
        $group_disciplines = DB::table('group_disciplines')->get();
        return View('subject_stud.index', compact(['subjects', 'disciplines', 'group', 'group_disciplines']));
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
