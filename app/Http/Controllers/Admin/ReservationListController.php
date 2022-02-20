<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReservationList;

class ReservationListController extends Controller
{
    public function index()
    {
        $reservationList = ReservationList::orderBy('date', 'desc')->get();

        return view('admin.reservation_list', ['reservationList' => $reservationList]);
    }
}
