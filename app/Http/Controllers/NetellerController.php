<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class NetellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('test');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function depositWebhook(Request $request) {
        file_put_contents('a.txt', $request->all());
    }
}
