<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DealsController extends Controller
{
    public function getDeals() {
        try {
            $apiResponse = Http::get("https://api.binance.com/api/v1/trades?symbol=ETHBTC");
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'data' => null,
            ]);
            return;
        }

        $result = [];
        foreach($apiResponse->json() as $deal) {
            array_push($result, [
                'time' => date('d-m-Y G:i:s', $deal['time']),
                'price' => $deal['price'],
                'qty' => $deal['qty'],
                'type' => $deal['isBuyerMaker'] ? 'Продажа' : 'Покупка',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $result,
        ]);
    }
}
