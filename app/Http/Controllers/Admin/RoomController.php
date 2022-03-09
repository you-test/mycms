<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderby('id', 'asc')->get();

        return view('admin.room', ['rooms' => $rooms]);
    }

    public function showRegisterForm()
    {
        return view('admin.room_register');
    }

    public function register(Request $request)
    {
        Room::create([
            'room' => $request->name,
        ]);

        return redirect()->route('room.index');
    }
}
