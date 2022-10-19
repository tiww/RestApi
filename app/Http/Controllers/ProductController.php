<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\FacadeS\file;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductModel::all();
        return view('pages.product.v_product', compact('product'));
    }

    public function add()
    {
        $categories = categoryModel::all();
        return view('pages.product.add', compact('categories'));
    }

    public function insert(Request $request)
    {
        $product = new ProductModel();
        if ($request->hasFile('images_p')) {
            $file = $request->file('images_p');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/img/product/', $filename);
            $product->images_p = $filename;
        }
        $product->category_id = $request->input('category_id');
        $product->name_p = $request->input('name_p');
        $product->price_p = $request->input('price_p');
        $product->desc_p = $request->input('desc_p');
        $product->save();
        return redirect('product')->with('status', "product updated succesfully");
    }

    public function edit($id)
    {
        $categories = categoryModel::all();
        $product = ProductModel::find($id);
        return view('pages.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = ProductModel::find($id);
        if ($request->hasFile('images_p')) {
            $path = 'assets/img/product/' . $product->images_p;
            if (file::exists($path)) {
                file::delete($path);
            }

            $file = $request->file('images_p');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/img/product/', $filename);
            $product->images_p = $filename;
        }
        $product->category_id = $request->input('category_id');
        $product->name_p = $request->input('name_p');
        $product->price_p = $request->input('price_p');
        $product->desc_p = $request->input('desc_p');
        $product->update();
        return redirect('product')->with('status', "product updated succesfully");
    }

    public function delete($id)
    {
        $product = ProductModel::find($id);
        if ($product->images_p) {
            $path = 'assets/img/product/' . $product->images_p;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('product')->with('status', "product Deleted Succesfully");
    }
}
