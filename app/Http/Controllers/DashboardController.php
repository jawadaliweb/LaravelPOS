<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class DashboardController extends Controller
{
    public function ViewDashboard() {
        $stock = Stock::get();
        
        return view('index', compact('stock'));
    }
}
