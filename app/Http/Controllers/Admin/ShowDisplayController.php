<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowDisplayController extends Controller
{
    public function showIndex()
    {
        return view('admin.index');
    }
}
