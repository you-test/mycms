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

        if ($data) {
            return view('admin.facilities', $data);
        }

        $this->create();
    }

    private function create()
    {
        Facilities::create(['name' => 'no name']);

        return view('admin.facilities', ['name' => 'no name']);
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
