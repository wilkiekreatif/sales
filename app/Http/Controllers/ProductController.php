<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query(); //berfungsi untuk mengambil query database tabel products
        
        $search = '%'.$request->query('search').'%'; //berfungsi untuk mengambil data dari URL sama dengan fungsi $_GET cuman lebih safe dan dimasukan ke dalam variable $search
        //fungsi persen diatas sama seperti query agar kondisi pencarian data bisa yang mengandung kata yang dicari

        $category_id = $request->query('category_id');


        if(!empty($request->query('search'))){
            $query->where('name','like',$search); //query database ditambah where dengan kondisi 'like'
        }

        if(!empty($category_id)){
            $query->where('category_id',$category_id); //query database ditambah where dengan kondisi '='
        }

        $products = $query->paginate(1);
        // $products = Product::where('name','like',$search)
        //     ->orWhere('category_id',$category_id) //jika parameter berisi 2, maka isi parameter tersebut yaitu nama field dan value dan isi kondisi adalah '='
        //     ->paginate(3); //didalam parameter where terdapat 3 parameter yaitu nama field, kondisi, dan value
        // // $products = Product::all();

        //coding untuk memunculkan filter pada index product
        $categories = Category::pluck('name','id');
        //berfungsi untuk menampilkan Pagination dengan code {{ $products->links() }} pada index.blade.php di folder product pada view.
        //namun harus diaktifkan terlebih dahulu paginator di file app/providers/AppServiceProvider.php
        //angka 2 dibawah berfungsi untuk memunculkan jumlah data pada setiap page
        // $products = Product::paginate(2);
        return view('admin.product.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric', //ditambahkan numeric karena price menggunakan BigInteger pada tabel nya, jika hanya menggunakan Integer, bisa digunakan Integer pada code nya
            'sku' => 'required',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image' //jika ingin melimit extensi bisa menggunakan 'mimes:' kemudian diikuti file extensi yang diinginkan pada bagian code setelah |, ex "nullable|mimes:pdf,docx,png"
            // jika ingin melimit size file, maka gunakan sintak max: [size dalam bentuk kb] ex: 'image' => 'nullable|image|max:1024'
        ]);

        // dd($request->all());
        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid()){
                $imageName = time().'.'.$image->getClientOriginalExtension(); //untuk penamaan file saat di simpan di server
                $image->storeAs('public/product',$imageName); //Sintak untuk memindahkan file dari user ke Server & lokasi penyimpanan file upload (pembacaan dimulai dari "storage/app")
                $inputs['image'] = $imageName;
            }else{
                //berfungsi untuk mengeluarkan data Image
                //data yang disimpan hanya category_id sampai status
                unset($inputs['image']);
            }
        }else{
            unset($inputs['image']);
        }

        $result = Product::create($inputs); //tidak menggunakan ->all() karena data tersebut diubah terlebih dahulu yaitu nama image dan penyimpanan datanya.

        if ($result){
            return redirect(route('product.index'))->with('success', 'Add data success!');
        }else{
            return redirect(route('product.index'))->with('failed', 'Add data failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
