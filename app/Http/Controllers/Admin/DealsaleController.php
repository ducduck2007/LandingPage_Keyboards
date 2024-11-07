<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DealsaleController extends Controller
{
    public function index()
    {
        return view('admin.deal_sale.dealSale_index');
    }
}
