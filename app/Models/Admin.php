<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, LaratrustUserTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image',
        'password',

    ];

    protected $append = ['image_path'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getImagePathAttribute() {

        return asset('uploads/users/'. $this->image);
    } // end of image path
}
