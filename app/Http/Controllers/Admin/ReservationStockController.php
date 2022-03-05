<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservationStock;
use Illuminate\Support\Facades\DB;

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
        // 月の日数を取得
        $daysPerMonth = date('t', strtotime($request->month . '-01'));

        // まずDBから対象年月のデータを取得
        $month = $request->month;
        $stocks = ReservationStock::whereMonth('date', $month)->orderBy('date', 'asc')->get();

        // データが存在する場合の処理
        if ($stocks) {

            return view('admin.reservation_stock', ['days' => $daysPerMonth, 'month' => $month]);
        }

        return view('admin.reservation_stock', ['days' => $daysPerMonth, 'month' => $month]);
    }

    /**
     * データの登録
     */
    public function registerStock(Request $request)
    {
        // 受け取る配列構造
       /*  $data = ['date =>'2011-01-01', 'room' => 1, 'amount' => 10],
            .....
            ]
        ]; */
        $data = $request->data;
        // var_dump($request->data);
        foreach ($data as $d) {
            ReservationStock::create([
                'date' => $d['date'],
                'room_id' => $d['room'],
                'amount' => $d['amount'],
            ]);
        }

        return redirect()->route('reservationStock.index');
        // DB::table('reservation_stocks')->insert([$data]);
    }
}
