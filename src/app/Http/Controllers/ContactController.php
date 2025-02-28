<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\WeightLog;

class ContactController extends Controller
{
    public function index (ContactRequest $request)
    {
        return view('register.step1');
    }

    public function step2()
    {
        return view('register.step2'); // 適切なビューを返す
    }

    public function create (ContactRequest $request)
    {
        return view('register.step2');
    }

    public function register (ContactRequest $request)
    {
        $validatedData = $request->validated();

        WeightLog::create([
            'user_id' => 1,
            'date' => now(),
            'weight' => $validatedData['weight'],
            'calories' => 0,
            'exercise_time' => '00:00',
            'exercise_content' => '',
        ]);

        return redirect('weight_logs');
    }

    public function login (ContactRequest $request)
    {
        return view('login');
    }
}
