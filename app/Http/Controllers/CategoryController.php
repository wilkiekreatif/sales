<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        // dd($categories);

        // admin.category.index diambil dari view index.blade.php dari folder Views->Admin->Category
        return view('admin.category.index',['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $inputcategory)
    {
        // dd($inputcategory->all()); untuk mengecek data yang dikirim sesuai

        $validator = Validator::make($inputcategory->all(),[
            'name'      => 'required',
            'status'    => 'required',
        ]);

        if ($validator->fails())
        {
            // return redirect('admin/category/create');
            return redirect()->back()->withErrors($validator->errors());
        }
    }
}