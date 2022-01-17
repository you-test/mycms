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

    public function showResult()
    {
        return view('site.result');
    }

    public function showInfo()
    {
        return view('site.info');
    }
}
