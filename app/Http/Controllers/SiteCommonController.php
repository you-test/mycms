<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;

class SiteCommonController extends Controller
{
    public static function getFacilities()
    {
        $data = Facilities::first();

        if ($data) {
            return $data['name'];
        }

        return 'no name';
    }
}
