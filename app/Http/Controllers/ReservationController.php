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

    public function showInfo(Request $request)
    {
        $room = $request->room;
        $request->session()->put('room', $room);

        return view('site.info');
    }

    public function showConfirm(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $mail = $request->mail;
        $pay = $request->pay;

        $request->session()->put('name', $name);
        $request->session()->put('address', $address);
        $request->session()->put('mail', $mail);
        $request->session()->put('pay', $pay);

        return view('site.confirm');
    }
}
