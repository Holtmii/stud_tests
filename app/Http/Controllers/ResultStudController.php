<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultStudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->query('discipline') != null)
            $subjects = DB::table('subjects')
                ->leftJoin('group__disciplines', 'group__disciplines.id_discipline', '=', 'subjects.id_discipline')
                ->where('subjects.id_discipline', $request->query('discipline'))
                ->get();
        else
            $subjects = DB::table('subjects')
                ->leftJoin('group__disciplines', 'group__disciplines.id_discipline', '=', 'subjects.id_discipline')
                ->get();

        $disciplines = DB::table('disciplines')->get();
        $group = DB::table('groups')->where('id', Auth::user()->id_group)->get();
        $group_disciplines = DB::table('group__disciplines')->get();
        $results = DB::table('results')->get();
        return View('result_stud.index', compact(['subjects', 'disciplines', 'group', 'group_disciplines', 'results']));
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
