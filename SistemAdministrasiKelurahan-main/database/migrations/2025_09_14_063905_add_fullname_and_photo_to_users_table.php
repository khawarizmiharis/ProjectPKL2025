<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullnameAndPhotoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom 'name' yang lama
            // $table->dropColumn('name');

            // Menambahkan kolom baru setelah 'id' dan 'nik'
            // $table->string('full_name')->after('nik');
            // $table->string('photo')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Mengembalikan kolom 'name'
            $table->string('name')->after('id');

            // Menghapus kolom yang baru ditambahkan
            $table->dropColumn('full_name');
            $table->dropColumn('photo');
        });
    }
}