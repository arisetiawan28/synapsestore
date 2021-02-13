<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_barang', function (Blueprint $table) {
            $table->id();
            $table->integer("transaksi_id");
            $table->integer("barang_id");
            $table->integer("customer_id");
            $table->integer("jumlah_barang");
            $table->decimal("jumlah_harga",9,2);
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
        Schema::dropIfExists('invoice_barang');
    }
}
