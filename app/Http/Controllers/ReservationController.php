<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\showConfirmRequest;
use App\Models\ReservationList;
use App\Models\Room;
use App\Models\ReservationStock;

class ReservationController extends Controller
{
    // トップページ表示
    public function index()
    {
        return view('site.index');
    }

    // 予約可能な部屋一覧表示
    public function showResult(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'num'  => 'required|max:10',
        ]);

        $date = $request->date;
        $num = $request->num;
        $rooms = [];

        // $full = ['1' => false, '2' => true]
        $roomRecords = Room::orderBy('id', 'asc')->get();
        foreach ($roomRecords as $roomRecord) {
            $roomId = $roomRecord->id;
            $reservatedRoomAmount = $this->getReservatedRoomAmount($date, $roomId);
            $setRoomAmount = $this->getSetRoomAmount($date, $roomId);
            if ($reservatedRoomAmount < $setRoomAmount) {
                $rooms[] = $roomRecord;
            }
        }

        $request->session()->put('date', $date);
        $request->session()->put('num', $num);

        return view('site.result', ['date' => $date, 'rooms' => $rooms]);
    }

    // 指定日の指定の部屋の予約済み数を取得
    private function getReservatedRoomAmount(string $date, int $roomId)
    {
        $reservatedRoomAmount = ReservationList::where('date', $date)->where('room', $roomId)->count();

        return $reservatedRoomAmount;
    }

    // 指定日の指定の部屋の在庫設定数を取得
    private function getSetRoomAmount(string $date, int $roomId)
    {
        $setRoom = ReservationStock::where('date', $date)->where('room_id', $roomId)->first();
        if ($setRoom) {
            $setRoomAmount = $setRoom->amount;
            return $setRoomAmount;
        }
        return 0;
    }

    public function redirectToInfo()
    {
        return view('site.info');
    }

    public function showInfo(Request $request)
    {
        // idが入る
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
        $room_id = $request->session()->get('room');
        $room = Room::where('id', $room_id)->first();
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
            'room' => $room->room,
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
        $room_id = $request->session()->get('room');
        $room = Room::where('id', $room_id)->first();
        $name= $request->session()->get('name');
        $address = $request->session()->get('address');
        $mail = $request->session()->get('mail');
        $pay = $request->session()->get('pay');

        $sessionData = [
            'date' => $date,
            'num' => $num,
            'room' => $room->room,
            'room_id' => $room_id,
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
            'room' => $sessionData['room_id'],
            'name' => $sessionData['name'],
            'address' => $sessionData['address'],
            'mail' => $sessionData['mail'],
            'pay' => $sessionData['pay'],
        ]);
    }
}
