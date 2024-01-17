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
                    'email' => ApiKey::all()->where('key', $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'products' => Product::all(),
                ]
            ]);
    }

    public function orders(Request $request, $apiKey)
    {
        return response()->json(
            [
                'status' => 'success',
                'user' => [
                    'email' => ApiKey::all()->where('key', $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'time' => Carbon::now(),
                    'orders' => Order::where('ready_at', '>', Carbon::now())->get(),
                ]
            ]);
    }

    public function ordersAll(Request $request, $apiKey)
    {
        return response()->json(
            [
                'status' => 'success',
                'user' => [
                    'email' => ApiKey::all()->where('key', $apiKey)->first()->user()->first()->email,
                    'key' => $apiKey,
                ],
                'data' => [
                    'orders' => Order::all(),
                ]
            ]);
    }

    public function order(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->has('Items')) {
            $jsonItems = $request->input('Items');

            $orderNumber = 1;
            do {
                $orderNumber++;
            } while (Order::where('ready_at', '>', Carbon::now())->where('order_number', $orderNumber)->exists());

            $order = Order::create([
                'order_number' => $orderNumber,
                'order_details' => json_encode($jsonItems),
                'ready_at' => Carbon::now()->addMinutes(rand(3, 6))
            ]);

            return response()->json(
                [
                    "status" => "success",
                    "data" => [
                        "order" => $order,
                        "req" => $request->input()
                    ]
                ]
            );
        }
        return response()->json(
            [
                "status" => "error",
                "data" => [
                    "req" => $request->input()
                ]
            ]
        );

    }

}
