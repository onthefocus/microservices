<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YahooFinanceController extends Controller
{
    public function get()
    {
        $result = [
            'status' => true,
            'report' => 'Active'
        ];
        return $result;
    }
}
