<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // TAMBAHKAN 'description' DI SINI
    protected $fillable = ['image', 'title', 'description'];
}
