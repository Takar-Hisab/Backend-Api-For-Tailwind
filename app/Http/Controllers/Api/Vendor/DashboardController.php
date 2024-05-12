<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getUser(Request $request)
    {
        return "called";
        return $request->user();
    }

    public function myCustomes()
    {
        return "called here my customer";
    }
}
