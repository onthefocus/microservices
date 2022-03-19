<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YahooFinanceController extends Controller
{
    private function getResult(string $code='') {

        $stockPrice = number_format(random_int(100, 999),0,'.',',');
        $tradeVolume = number_format(random_int(100000, 999999),0,'.',',');
        $minPrice = number_format($stockPrice - random_int(1, 10),0,'.',',');
        $maxPrice = number_format($stockPrice + random_int(5, 15),0,'.',',');
        $year = 2022;
        $curency = '€';
        $result = [
            'status' => true,
            'code' => $code,
            'trade_volume' => $tradeVolume,
            'current_price' => $stockPrice,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'currency' => $curency,
            'summary' => "Trading Volume ($year): $tradeVolume shares\nTrading Range ($year): $minPrice$curency - $maxPrice$curency\nCurrent Share Price: $stockPrice$curency"
        ];
        return $result;
    }
    public function get(string $code=null)
    {
        return $this->getResult($code);
    }
    public function post(Request $request)
    {
        $code = $request['code'];
        return $this->getResult($code);
    }
}
