<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use HasFactory;
    use Translatable;


    protected $guarded = [];

    public $translatedAttributes = ['name'];

    protected $fillable = ['image','status'];

    public function products() {

        return $this->hasMany(Product::class);
    } // end of product
    
} // end of model
