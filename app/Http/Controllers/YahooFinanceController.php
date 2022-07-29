<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YahooFinanceController extends Controller
{
    private function getResult(string $code='') {

        $stockPrice = number_format(random_int(240, 260),0,'.',',');
        $tradeVolume = number_format(random_int(190, 200)/10,0,'.',',');
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
            'summary' => "Market Cap ($year): $tradeVolume B\nTrading Range ($year): $minPrice$curency - $maxPrice$curency\nCurrent Stock Price: $stockPrice$curency"
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
