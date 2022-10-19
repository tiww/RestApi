<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryModel;

class ReportController extends Controller
{
    public function index()
    {
        $categories = categoryModel::where('parent_id', null)
            ->with(['children' => function ($query) {
                $query->withSum(['transactions' => function ($query) {
                    $query->where('paid_at', '>', now()->subMonths(value: 3));
                }], 'price');
            }])
            ->get();
        $total = $categories->pluck('children')
            ->flatten()
            ->sum('transactions_sum_price');
        return view('report', compact('categories', 'total'));
    }
}
