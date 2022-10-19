<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\TreatmentModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\FacadeS\file;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatment = TreatmentModel::all();
        return view('pages.treatment.v_treatment', compact('treatment'));
    }

    public function add()
    {
        $categories = categoryModel::all();
        return view('pages.treatment.add', compact('categories'));
    }

    public function insert(Request $request)
    {
        $treatment = new TreatmentModel();
        // $categories = categoryModel::all();
        if ($request->hasFile('images_t')) {
            $file = $request->file('images_t');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/img/treatment/', $filename);
            $treatment->images_t = $filename;
        }
        // $categories->$request->all();
        $treatment->category_id = $request->input('category_id');
        $treatment->name_t = $request->input('name_t');
        $treatment->price_t = $request->input('price_t');
        $treatment->description_t = $request->input('description_t');
        $treatment->save();
        return redirect('treatment')->with('status', "treatment updated succesfully");
    }

    public function edit($treatment_id)
    {
        $categories = categoryModel::all();
        $treatment = TreatmentModel::find($treatment_id);
        return view('pages.treatment.edit', compact('treatment', 'categories'));
    }

    public function update(Request $request, $treatment_id)
    {
        $treatment = TreatmentModel::find($treatment_id);
        if ($request->hasFile('images_t')) {
            $path = 'assets/img/treatment/' . $treatment->images_t;
            if (file::exists($path)) {
                file::delete($path);
            }

            $file = $request->file('images_t');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/img/treatment/', $filename);
            $treatment->images_t = $filename;
        }
        $treatment->category_id = $request->input('category_id');
        $treatment->name_t = $request->input('name_t');
        $treatment->price_t = $request->input('price_t');
        $treatment->description_t = $request->input('description_t');
        $treatment->update();
        return redirect('treatment')->with('status', "treatment updated succesfully");
    }

    public function delete($treatment_id)
    {
        $treatment = TreatmentModel::find($treatment_id);
        if ($treatment->images_t) {
            $path = 'assets/img/treatment/' . $treatment->images_t;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $treatment->delete();
        return redirect('treatment')->with('status', "Treatment Deleted Succesfully");
    }

    public function laporan()
    {
        // echo "INI NAH WOY";
        $treatment = TreatmentModel::all();
        $pdf = PDF::loadview('pages.treatment.laporanpdf', compact('treatment'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('report-treatment.pdf');
    }
}
