<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //pilih salah satu dari Fillable atau Guarded untuk menentukan field database
    //jika menggunakan cara kedua pada category controller
    //isi dari fillable dilihat dari table category pada database dan hanya field yang akan di manipulasi oleh user
    protected $fillable = [
        'name',
        'status',
    ];
    
    //asi dari guarded dilihat dari table category pada database dan hanya field yang tidak boleh dimanipulasi oleh user
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];

    //digunakan untuk relasi data Many
    public function productonetomany()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
