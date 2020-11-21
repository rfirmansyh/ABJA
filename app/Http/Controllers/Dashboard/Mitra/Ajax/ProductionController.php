<?php

namespace App\Http\Controllers\Dashboard\Mitra\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function getKebutuhanTypeById($id) {
        $kebutuhanType = \App\KebutuhanType::find($id);
        return api_response(1, 'KebutuhanType By Id Success', $kebutuhanType);
    }
}
