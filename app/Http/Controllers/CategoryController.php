<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

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
        // Simpan dengan cara pertama
        // $validator = Validator::make($inputcategory->all(),[
        //     'name'      => 'required',
        //     'status'    => 'required',
        // ],[
        //     'name.required' => 'Nama tidak boleh kosong!',
        //     'status.required' => 'Status harus dipilih salah satu!'
        // ]);

        // if ($validator->fails())
        // {
        //     // return redirect('admin/category/create');
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator->errors())
        //         ->withInput($inputcategory->all()); //berfungsi untuk menampilkan data sebelumnya yang telah terisi pada form input
        // }else{
        //     //simpan data
        //     $category   = new Category();
        //     $category->name = $inputcategory->input('name');
        //     $category->status = $inputcategory->input('status');
        //     $result = $category->save();

        //     if ($result){
        //         return redirect('admin/category')->with('success', 'Add data success!');
        //     }else{
        //         return redirect('admin/category')->with('failed', 'Add data failed!');
        //     }
        // }

        // Validasi data menggunakan cara kedua pengisian Rules untuk menentukan pengisian Forms
        $inputcategory->validate([
            'name'      => 'required',
            'status'    => 'required|in:active,inactive', //fungsi in untuk penggunaan enum / isi yang sudah ditentukan seperti Select
        ]);

        // Simpan data menggunakan cara kedua
        // Mass assignment
        $result = Category::create($inputcategory->all());

        if ($result){
            return redirect('admin/category')->with('success', 'Add data success!'); //directory bisa menggunakan / atau .
        }else{
            return redirect('admin/category')->with('failed', 'Add data failed!');
        }
    }

    public function show($id)
    {
        // dd($id);
        //pengambilan data id dari database
        // $category = Category::find($id); //pengambilan data khsusu untuk id dapat menggunakan sintak find, find hanya mengembalikan 1 data
        $category = Category::findOrFail($id); //sama dengan find hanya saja jika mengisi dengan id yang tidak akan memunculkan halaman 404 Not Found
        // Category::where('name',$name)
        //     ->where('name','isi data') 
        //     ->get(); mengambil banyak data
        //     ->first(); mengambil data pertama

        return view('admin.category.show',['category' => $category]); //directory bisa menggunakan / atau .
    }

    //$untuk fungsi Route Model Binding, parameter menggunakan Model kemudian diikuti nama variabel bebas dan variabel tersebut ditampilkan pada route web
    // Route Model Binding sudah mengcover code "category = Category::findOrFail($id);"
    public function edit(Category $kategori)
    {
        return view('admin.category.edit',['datakategori' =>$kategori]);
    }

    public function update(Request $request, Category $updatecategory)
    {
        // dd($updatecategory);
        // Validasi data sebelum disimpan
        $request->validate([
            'name'      => 'required',
            'status'    => 'required|in:active,inactive'
        ]);

        // $updatecategory->name = $request->input('name');
        // $updatecategory->status = $request->input('status');
        // $result = $updatecategory->save();

        $result = $updatecategory->update($request->all());

        if ($result){
            return redirect('admin/category')->with('success', 'Update data success!'); 
        }else{
            return redirect('admin/category')->with('failed', 'Update data failed!');
        }
    }

    public function destroy(Category $deletecategory)
    {
        // dd($deletecategory);

        $result = $deletecategory->delete();

        if ($result){
            return redirect('admin/category')->with('success', 'Delete data success!'); 
        }else{
            return redirect('admin/category')->with('failed', 'Delete data failed!');
        }
    }
}