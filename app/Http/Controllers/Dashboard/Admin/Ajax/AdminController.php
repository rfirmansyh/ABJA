<?php

namespace App\Http\Controllers\Dashboard\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function getUsers(Request $request) 
    {
        $users = \App\User::where('role_id', '=', '2');
        // foto, email, nama, budidaya,status, action
        return DataTables::of($users)
            ->addColumn('photo', function($user) {
                return '<div class="table-img"><img src='. asset('img/users/2.jpg') .' alt=""></div>';
            })
            ->addColumn('email', function($user) {
                return $user->email;
            })
            ->addColumn('name', function($user) {
                return $user->name;
            })
            ->addColumn('budidaya', function($user) {
                return count($user->budidayas);
            })
            ->addColumn('status', function($user) {
                if ($user->status === '0') {
                    return '<span class="badge badge-secondary">Nonaktif</span>';
                } else {
                    return '<span class="badge badge-success">Aktif</span>';
                }
            }) 
            ->addColumn('action', function($user) {
                return '<a href="'.url('ui/unitkerja/show').'" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a><a href="'.url('ui/dashboard/admin/users/edit').'" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a><a href="'.url('ui/dashboard/admin/users/edit').'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>';
            })
            ->rawColumns(['photo', 'status', 'action'])->make(true);
        
    }
}
