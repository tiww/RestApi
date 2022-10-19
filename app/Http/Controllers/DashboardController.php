<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $order = DB::table('orders')->count();
        $user = DB::table('users')->count();
        return view('layouts.headers.cards', compact('user', 'order'));
    }
}
