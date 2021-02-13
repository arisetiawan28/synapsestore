<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();

            $table->string ("kode_barang");
            $table->string ("nama_barang");
            $table->decimal ("harga_barang",9,2);
            $table->text ("deskripsi_barang");
            $table->integer ("jumlah_barang");
            $table->integer ("created_by");
            $table->integer ("updated_by");
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
