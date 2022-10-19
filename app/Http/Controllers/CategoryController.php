<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\FacadeS\file;

class CategoryController extends Controller
{
    public function index()
    {
        $data['title'] = 'List Categories';
        $categories = categoryModel::all();
        return view('pages.categories.v_categories', compact('categories'), $data);
    }

    public function add()
    {
        $data['title'] = 'Add New Category';
        return view('pages.categories.add', $data);
    }

    public function insert(Request $request)
    {
        $categories = new categoryModel();
        // if ($request->hasFile('category_images')) {
        //     $file = $request->file('category_images');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('assets/img/category/', $filename);
        //     $categories->category_images = $filename;
        // }

        $categories->category_name = $request->input('category_name');
        $categories->category_desc = $request->input('category_desc');
        $categories->save();
        return redirect('category')->with('status', "category added succesfully");
    }

    public function edit($id)
    {
        $categories = categoryModel::find($id);
        return view('pages.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = categoryModel::find($id);
        if ($request->hasFile('category_images')) {
            $path = 'assets/img/category/' . $categories->category_images;
            if (file::exists($path)) {
                file::delete($path);
            }

            $file = $request->file('category_images');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/img/category/', $filename);
            $categories->category_images = $filename;
        }
        $categories->category_name = $request->input('category_name');
        $categories->category_desc = $request->input('category_desc');
        $categories->update();
        return redirect('category')->with('status', "category updated succesfully");
    }

    public function delete($id)
    {
        $categories = categoryModel::find($id);
        if ($categories->category_images) {
            $path = 'assets/img/category/' . $categories->category_images;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $categories->delete();
        return redirect('category')->with('status', "Category Deleted Succesfully");
    }
}
