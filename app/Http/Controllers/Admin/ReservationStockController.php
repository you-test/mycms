<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function getReservationStock()
    {

    }

    /**
     * データの登録
     */
    public function reservationStockRegister()
    {

    }
}
