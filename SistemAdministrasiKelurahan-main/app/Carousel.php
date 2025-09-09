<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    // Baris ini mengizinkan kolom 'image' dan 'title' untuk diisi secara massal
    protected $fillable = ['image', 'title'];
}
    