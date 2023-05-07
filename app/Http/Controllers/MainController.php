<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function user(Request $request) {
        if($request->query('user_role') != null and $request->query('super_user') != null)
            $user = DB::table('users')
                ->select(DB::raw('users.*, groups.name as group_name'))
                ->leftJoin('groups', 'users.id_group', '=', 'groups.id')
                ->where('role_pers', '=', $request->query('user_role'))
                ->where('role_superuser', '=', $request->query('super_user'))
                ->get();
        else
            $user = DB::table('users')
                ->select(DB::raw('users.*, groups.name as group_name'))
                ->leftJoin('groups', 'users.id_group', '=', 'groups.id')
                ->get();

        $groups = DB::table('groups')->get();

        return view('user', compact('user'), compact('groups'));
    }


    public function user_create(Request $request) {
        $request->merge(['password' => Hash::make($request->get('password'))]);
        User::create($request->all());
        return Redirect('user');
    }


//    public function discipline() {
//        return view('discipline');
//    }

    public function discipline_teach() {
        $disciplines = DB::table('disciplines')->get();
        $users = DB::table('users')->get();
        return View('discipline.index', compact('disciplines'), compact('users'));
    }

//    public function group() {
//        return view('group');
//    }


//    public function group_create(Request $request)
//    {
//        $group = new Group();
//
//        $group->name = $request->input('name');
//        $group->save();
//        return Redirect('user');
//    }

}
