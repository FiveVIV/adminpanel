<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request): View
    {

        $type = $request->query("type", "month");

        return view("calendar", [
            "type" => "calendar.$type-view",
        ]);
    }
}
