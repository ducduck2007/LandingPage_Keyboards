<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CMSUserController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function hello() {
        return view('admin.sub.hello');
    }
}
