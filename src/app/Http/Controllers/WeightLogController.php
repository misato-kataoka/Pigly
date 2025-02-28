<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;

class WeightLogController extends Controller
{
    public function admin()
    {
        // weight_logsのデータを取得
        $weightLogs = WeightLog::where('user_id', 1)->paginate(8);

        return view('weight_logs.admin', compact('weightLogs'));
    }
}
