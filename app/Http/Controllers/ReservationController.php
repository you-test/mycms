<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // トップページ表示
    public function index()
    {
        return view('site.index');
    }

    public function showResult(Request $request)
    {
        $date = $request->date;
        $num = $request->num;
        $request->session()->put('date', $date);
        $request->session()->put('num', $num);

        return view('site.result');
    }

    public function showInfo()
    {
        return view('site.info');
    }

    public function showConfirm()
    {
        return view('site.confirm');
    }
}
