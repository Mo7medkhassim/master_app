<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Translatable;


    protected $guarded = [];

    protected $append = ['image_path', 'profit_percent'];

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'category_id', 'image', 'purchase_price', 'sale_price', 'stock',
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }


    public function getImagePathAttribute()
    {

        return asset('uploads/products/' . $this->image);
    } // end of image path

    public function getProfitPercentAttribute()
    {

        $profit = $this->sale_price - $this->purchase_price;

        $profit_percent = $profit * 100 / $this->purchase_price;

        return number_format($profit_percent, 2);
    }
}
