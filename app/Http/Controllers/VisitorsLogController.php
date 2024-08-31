<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorsLog;

class VisitorsLogController extends Controller
{
    // Метод для логирования визитов
    public static function logVisit(Request $request)
    {
        VisitorsLog::create([
            'visited_at' => now(),
            'page_visited' => $request->path(),
            'ip_address' => $request->ip(),
            'host_name' => gethostbyaddr($request->ip()),
            'browser_name' => $request->header('User-Agent'),
        ]);
    }
}
