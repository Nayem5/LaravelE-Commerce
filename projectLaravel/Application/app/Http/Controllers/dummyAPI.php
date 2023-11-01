<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    public function getData(Request $request){
        return redirect("welcome");
    }
}
