<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\categoryModel;
use App\Models\TreatmentModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $treatment = TreatmentModel::where('status', '1')->get();
        $product = ProductModel::where('status', '1')->get();
        $category = categoryModel::where('status', '1')->get();

        return view('front.index', compact('treatment', 'category', 'product'));
        // return view('front.index', $data);
        // return view('userHome');
    }

    public function adminHome()
    {
        return view('welcome');
    }
}
