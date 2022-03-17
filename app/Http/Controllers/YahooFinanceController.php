<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YahooFinanceController extends Controller
{
    public function get(string $code=null)
    {
        $result = [
            'status' => true,
            'code' => $code,
            'trade_volume' => random_int(100000, 999999),
            'current_price' => random_int(100, 999),
        ];
        return $result;
    }
}
