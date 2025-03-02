<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function index ()
    {
        return view('register.step1');
    }

    public function step2()
    {
        return view('register.step2'); // 適切なビューを返す
    }

    public function create (ContactRequest $request)
    {
        return view('register.step2')->with('data', $request->validated());;
    }

    public function register (ContactRequest $request)
    {
        $validatedData = $request->validated();

        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => now(),
            'weight' => $validatedData['weight'],
            'calories' => 0,
            'exercise_time' => '00:00',
            'exercise_content' => '',
        ]);

        return redirect('weight_logs')->with('success', '体重ログが正常に登録されました。');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 認証試行
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // 認証成功
            return redirect()->intended('/home'); // 認証後のリダイレクト先
        }

        // 認証失敗
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ])->withInput(); // 入力内容を保持
    }
}
