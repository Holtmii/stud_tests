<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $disciplines = DB::table('disciplines')->get();

        $disciplines = DB::table('disciplines')
            ->select(DB::raw('disciplines.*, users.surname as user_surname, users.name as user_name, users.middlename as user_middlename'))
            ->leftJoin('users', 'disciplines.id_user', '=', 'users.id')
            ->get();


        $users = DB::table('users')->get();
        return View('discipline.index', compact('disciplines'), compact('users'));
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
        Discipline::create($request->all());
        return Redirect('discipline');
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
