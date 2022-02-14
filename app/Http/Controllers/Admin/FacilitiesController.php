<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;

class FacilitiesController extends Controller
{
    public function index()
    {
        $data = Facilities::first();

        return view('admin.facilities', $data);
    }

    public function update(Request $request)
    {
        $request->validate(
            ['facilitiesName' => 'required'],
            ['facilitiesName.required' => ':attributeは必須です。'],
        );

        $data = Facilities::first();
        $data->name = $request->facilitiesName;
        $data->update();

        return redirect()->route('facilities.index');
    }
}
