<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $disciplines = DB::table('disciplines')->get();
        $groups = DB::table('groups')->get();
        $group_disciplines = DB::table('group__disciplines')->get();

        if($request->discipline != null)
            $subjects = DB::table('subjects')->where('id_discipline', $request->discipline)->get();

        $users = DB::table('users')->get();
        $results = DB::table('results')->get();

        if(isset($subjects))
            return View('result_teach.index', compact(['disciplines', 'groups', 'group_disciplines', 'subjects', 'users', 'results']));
        else
            return View('result_teach.index', compact(['disciplines', 'groups', 'group_disciplines', 'users', 'results']));


        return View('result_teach.index');
    }
}
