<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class WeightLogController extends Controller
{
    public function admin()
    {
        // weight_logsのデータを取得
        $weightLogs = WeightLog::where('user_id', 1)->paginate(8);

        // weight_targetテーブルから目標体重を取得
        $weightTarget = WeightTarget::where('user_id', 1)->first(); // ユーザーIDに基づいて取得

        // 最新の体重を取得
        $latestWeight = WeightLog::where('user_id', 1)->latest()->first()->weight ?? 0; // 最新の体重を取得

        return view('weight_logs.admin', compact('weightLogs', 'weightTarget', 'latestWeight'));
    }
}
