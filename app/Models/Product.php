<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //penggunaan untuk relasi antar table One
    public function categoryonetomany()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
