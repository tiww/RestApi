<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\TreatmentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;


class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     $data['title'] = 'Home';
    //     return view('front.index', $data);
    //     // return view('userHome');
    // }


    public function index()
    {
        $treatment = TreatmentModel::where('status', '1')->get();
        $product = ProductModel::where('status', '1')->get();
        $category = categoryModel::where('status', '1')->get();

        return view('front.index', compact('treatment', 'category', 'product'));
    }

    public function adminHome()
    {
        return view('welcome');
    }

    public function viewcategory($id)
    {
        if (categoryModel::where('id', $id)->exists()) {
            // $data['title'] = 'Services & Product';
            $category = categoryModel::where('id', $id)->first();
            $treatment = TreatmentModel::where('status', '1')->where('category_id', $id)->get();
            return view('front.treatment.cards', compact('category', 'treatment'));
        } else {
            return redirect('/')->with('status', "id doesnot exists");
        }
    }

    public function detailTreatment($id)
    {
        $data['title'] = 'Treatment';
        if (TreatmentModel::where('treatment_id', $id)->exists()) {
            $treatment = TreatmentModel::where('treatment_id', $id)->first();
            return view('front.treatment.details', compact('treatment'), $data);
        } else {
            return redirect('/')->with('status', "the link was broken");
        }
    }

    public function detailProduct($id)
    {
        $data['title'] = 'Product';
        if (ProductModel::where('id', $id)->exists()) {
            $product = ProductModel::where('id', $id)->first();
            return view('front.product.details', compact('product'), $data);
        } else {
            return redirect('/')->with('status', "the link was broken");
        }
    }
}
