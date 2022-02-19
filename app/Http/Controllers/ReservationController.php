<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\showConfirmRequest;
use App\Models\ReservationList;

class ReservationController extends Controller
{
    // トップページ表示
    public function index()
    {
        return view('site.index');
    }

    public function showResult(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'num'  => 'required|max:10',
        ]);

        $date = $request->date;
        $num = $request->num;
        $request->session()->put('date', $date);
        $request->session()->put('num', $num);

        return view('site.result', ['date' => $date]);
    }

    public function redirectToInfo()
    {
        return view('site.info');
    }

    public function showInfo(Request $request)
    {
        $room = $request->room;
        $request->session()->put('room', $room);

        return view('site.info');
    }

    public function showConfirm(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mail' => 'required|max:255|min:8|email',
            'pay' => 'required',
        ]);

        $date = $request->session()->get('date');
        $num = $request->session()->get('num');
        $room = $request->session()->get('room');
        $name = $request->name;
        $address = $request->address;
        $mail = $request->mail;
        $pay = $request->pay;

        $request->session()->put('name', $name);
        $request->session()->put('address', $address);
        $request->session()->put('mail', $mail);
        $request->session()->put('pay', $pay);

        $confirmData = [
            'date' => $date,
            'num' => $num,
            'room' => $room,
            'name' => $name,
            'address' => $address,
            'mail' => $mail,
            'pay' => $pay,
        ];

        return view('site.confirm', $confirmData);
    }

    public function showComplete(Request $request)
    {
        $date = $request->session()->get('date');
        $num = $request->session()->get('num');
        $room = $request->session()->get('room');
        $name= $request->session()->get('name');
        $address = $request->session()->get('address');
        $mail = $request->session()->get('mail');
        $pay = $request->session()->get('pay');

        $sessionData = [
            'date' => $date,
            'num' => $num,
            'room' => $room,
            'name' => $name,
            'address' => $address,
            'mail' => $mail,
            'pay' => $pay,
        ];

        $this->addReservation($sessionData);

        $request->session()->flush();

        return view('site.complete', $sessionData);
    }

    private function addReservation(array $sessionData)
    {
        ReservationList::create([
            'date' => $sessionData['date'],
            'num' => $sessionData['num'],
            'room' => $sessionData['room'],
            'name' => $sessionData['name'],
            'address' => $sessionData['address'],
            'mail' => $sessionData['mail'],
            'pay' => $sessionData['pay'],
        ]);
    }
}
