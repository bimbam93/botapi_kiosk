<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KioskApiController extends Controller
{
    public function products(Request $request, $apiKey)
    {
        return response()->json(
            [
                'status' => 'success',
                'user' => [
                    'email' => ApiKey::all()->where('key',  $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'products' => Product::all(),
                ]
            ]);
    }

    public function orders(Request $request, $apiKey){
        return response()->json(
            [
                'status' => 'success',
                'user' => [
                    'email' => ApiKey::all()->where('key',  $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'time' => Carbon::now(),
                    'orders' => Order::all()->where('ready_at', '>', Carbon::now()),
                ]
            ]);
    }

    public function ordersAll(Request $request, $apiKey){
        return response()->json(
            [
                'status' => 'success',
                'user' => [
                    'email' => ApiKey::all()->where('key',  $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'orders' => Order::all(),
                ]
            ]);
    }

}
