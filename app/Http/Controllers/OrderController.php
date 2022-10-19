<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ServicesOrderModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = OrderModel::all();
        $pesan = DB::table('order_services')->count();
        return view('pages.order.orderan', compact('order', 'pesan'));
    }
    public function view($order_id)
    {
        if (OrderModel::where('id', $order_id)->exists()) {
            $order = OrderModel::find($order_id);
            return view('pages.order.view', compact('order'));
        } else {
            return redirect()->back()->with('status', 'No Order Found');
        }
    }

    public function process($order_id)
    {
        if (OrderModel::where('id', $order_id)->exists()) {
            $order = OrderModel::find($order_id);
            return view('pages.order.process', compact('order'));
        } else {
            return redirect()->back()->with('status', 'No Order Found');
        }
    }

    public function laporan()
    {
        $order = OrderModel::all();
        $orderitem = ServicesOrderModel::all();
        $pdf = PDF::loadview('pages.order.laporanpdf', compact('order', 'orderitem'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('report.pdf');
    }
}
