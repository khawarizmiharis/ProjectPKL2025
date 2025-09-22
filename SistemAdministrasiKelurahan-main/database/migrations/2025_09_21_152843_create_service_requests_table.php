<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();

            // Data dari form
            $table->string('name');                        // Nama pemohon
            $table->string('email');                       // Email pemohon
            $table->string('phone');                       // Nomor HP
            $table->unsignedBigInteger('service_category_id'); // Relasi ke kategori pelayanan
            $table->text('description');                   // Keterangan pelayanan
            $table->string('document')->nullable();        // Dokumen pendukung (opsional)

            // Status permintaan
            $table->string('status')->default('pending');  // pending, approved, rejected

            $table->timestamps();

            // optional foreign key (kalau tabel service_categories sudah ada)
            // $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_requests');
    }
}