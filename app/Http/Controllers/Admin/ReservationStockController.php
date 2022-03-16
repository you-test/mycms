<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservationStock;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class ReservationStockController extends Controller
{
    public function index()
    {
        return view('admin.reservation_stock', ['days' => 0]);
    }

    /**
     * 選択した月の在庫設定データを取得する
     *
     */
    public function getStocks(Request $request)
    {
        // 客室設定で設定している部屋タイプ
        $rooms = Room::all();
        // 月の日数を取得
        $daysPerMonth = date('t', strtotime($request->month . '-01'));

        // まずDBから対象年月のデータを取得
        $month = $request->month;
        $stocks = ReservationStock::whereMonth('date', substr($month, 5, 2))->orderBy('date', 'asc')->get();

        // 各部屋タイプごとの連想配列の形のデータ $stocks = [1 => [room_idが1のコレクション,... ] ,2 => [room_idが２のコレクション,...]]
        $stocksPerRooms = [];
        foreach ($rooms as $room) {
            foreach ($stocks as $stock) {
                if ($stock->room_id === $room->id) {
                    $stocksPerRooms[$room->id][] = $stock;
                }
            }
        }

        // データが存在する場合の処理
        if (!empty($stocksPerRooms)) {
            return view('admin.reservation_stock', [
                'rooms' => $rooms,
                'days' => $daysPerMonth,
                'month' => $month,
                'stocks' => $stocksPerRooms,
            ]);
        }

        return view('admin.reservation_stock', [
            'rooms' => $rooms,
            'days' => $daysPerMonth,
            'month' => $month
        ]);
    }

    /**
     * データの登録・更新
     */
    public function registerStock(Request $request)
    {
        /**
         * $data = [
         * 'room1_0' => ['amount' => 2, 'room' => 1, 'date' => '2022-3-1],
         * 'room2_0' => ['amount' => 3, 'room' => 2, 'date' => '2022-3-1],
         * ....
         * ];
         */
        $data = $request->data;
        foreach ($data as $d) {
            if (ReservationStock::where('date', $d['date'])->where('room_id', $d['room'])->first()) {
                $this->update($d);
            } else {
                $this->registerNew($d);
            }
        }

        return redirect()->route('reservationStock.index');
    }

    // 既存データがないときの登録
    private function registerNew($d)
    {
        ReservationStock::create([
            'date' => $d['date'],
            'room_id' => $d['room'],
            'amount' => isset($d['amount']) ? $d['amount'] : 0,
        ]);
    }

    // 既存データがあるときの更新
    private function update($d)
    {
        ReservationStock::where('date', $d['date'])
                        ->where('room_id', $d['room'])
                        ->update([
                            'date' => $d['date'],
                            'room_id' => $d['room'],
                            'amount' => isset($d['amount']) ? $d['amount'] : 0,
                        ]);
    }



}
