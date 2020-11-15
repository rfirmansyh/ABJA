<?php

namespace App\Http\Controllers\Dashboard\Mitra\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudidayaController extends Controller
{
    public function getUserById(Request $request, $id) {
        $user = \App\User::findOrFail($id);
        return api_response(1, 'User By Id Success', $user);
    }
    
}
