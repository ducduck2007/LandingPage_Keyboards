<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameMiniController extends Controller
{
    public function forTelegram(Request $req, $any){
        $array = explode('$', $any);

        return view('client.waitLogin', compact('array'));
    }
}
