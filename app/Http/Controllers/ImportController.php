<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('welcome', compact('products'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls'
        ]);

        $data = $request->file('file');

        Excel::import(new ProductsImport, $data);

        return redirect('/')->with('success', 'All good!');
    }
}
