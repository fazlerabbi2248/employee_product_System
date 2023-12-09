<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products'; 

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name',
        'details',
        'price',
        'thumbnail_image',
    ];
    use HasFactory;

    public function images()
        {
            return $this->hasMany(ProductImage::class);
        }
}
