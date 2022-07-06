<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['phone' => 'array'];

    protected $fillable = [
        'name', 'phone', 'address'
    ]; // end of fillable

    public function getNameAttribute ($value) {

        return ucfirst($value);
    } // end of get name

    public function orders () {

        return $this-> hasMany(Order::class);

    } // end of orders

} // end of cliemt