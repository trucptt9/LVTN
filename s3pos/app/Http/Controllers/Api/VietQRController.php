<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VietQRController extends Controller
{
    public static function loadBanks()
    {
        $query = Http::get('https://api.vietqr.io/v2/banks');
        $list = $query['data'] ?? [];
        Cache::forever('cache-list-bank', $list);
    }

    public static function generateQrCode($accountNo, $bankCode, $data = [])
    {
        $string = http_build_query($data);
        $uri = "https://img.vietqr.io/image/$bankCode-$accountNo-compact.png?" . $string;
        return $uri;
    }
}
