<?php

use Illuminate\Database\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->d();
            $table->string('image');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
}