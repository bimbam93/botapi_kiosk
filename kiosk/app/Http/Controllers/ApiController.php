<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index (Request $request) {
        return response()->json([
            'status' => "success",
            'data' => [
                'ping' => 'pong'
            ]
        ]);
    }
}
