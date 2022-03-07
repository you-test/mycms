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
        $stocks = ReservationStock::whereMonth('date', substr($month, 5, 2))->orderBy('date', 'asc')->get();

        // データが存在する場合の処理
        if ($stocks) {
            return view('admin.reservation_stock', [
                'days' => $daysPerMonth,
                'month' => $month,
                'stocks' => $stocks,
            ]);
        }

        return view('admin.reservation_stock', [
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
         * $data = [['date =>'2011-01-01', 'room' => 1, 'amount' => 10],
         *   .....
         *  ]];
         */
        $data = $request->data;
        foreach ($data as $d) {
            if (ReservationStock::where('date', $d['date'])->first()) {
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
                        ->update([
                            'date' => $d['date'],
                            'room_id' => $d['room'],
                            'amount' => isset($d['amount']) ? $d['amount'] : 0,
                        ]);
    }



}
