<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index (ContactRequest $request)
    {
        return view('register.step1');
    }

    public function create (ContactRequest $request)
    {
        return view('register.step2');
    }

    public function register ()
    {
        return view('weight_logs');
    }

    public function login (ContactRequest $request)
    {
        return view('login');
    }
}
