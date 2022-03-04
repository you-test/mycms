<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservationStock;

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
        $stocks = ReservationStock::whereMonth('date', '$month')->orderBy('date', 'asc')->get();
        if ($stocks) {

            return view('admin.reservation_stock', ['days' => $daysPerMonth]);
        }

        return view('admin.reservation_stock', ['days' => $daysPerMonth]);
    }

    /**
     * データの登録
     */
    public function registerStock(Request $request)
    {

    }
}
