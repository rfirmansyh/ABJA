<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.modules.admin.index');
    }

    public function test()
    {
        $user = \App\User::find('1')->role->id;
        dd($user);
        return view('dashboard.modules.admin.index')->withRoles($roles);
    }
}
