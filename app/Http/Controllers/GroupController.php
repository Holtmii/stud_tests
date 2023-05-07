<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $groups = DB::table('groups')->get();
        $users = DB::table('users')->orderBy('surname')->get();
//            DB::select('select id_group, GROUP_CONCAT(fio SEPARATOR \',\n\') as result from (select id_group, CONCAT(surname, \' \', name,\' \', middlename) as fio from users WHERE id_group > 0) as res group by id_group');
        return View('group.index', compact(['users', 'groups']));
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
        Group::create($request->all());
        return Redirect('group');
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
