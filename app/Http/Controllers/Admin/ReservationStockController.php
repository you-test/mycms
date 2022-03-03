<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\getReservationStock;

class ReservationStockController extends Controller
{
    public function index()
    {
        return view('admin.reservation_stock');
    }

    /**
     * 選択した月の在庫設定データを取得する
     *
     */
    public function getReservationStock(Request $request)
    {
        // まずDBから対象年月のデータを取得
        $month = $request->month;
        ReservationStock::whereMonth('date', '$month')->orderBy('date', 'asc')->get();
    }

    /**
     * データの登録
     */
    public function reservationStockRegister()
    {

    }
}
