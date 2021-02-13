<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer("customer_id");
            $table->integer("keranjang_id");
            $table->string("kode_transaksi");
            $table->decimal("jumlah_transaksi",9,2);
            $table->integer("metode_pembayaran");
            $table->string("kurir")->nullable();
            $table->decimal("ongkir",9,2);
            $table->string("no_resi")->nullable();
            $table->datetime("waktu_sampai")->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
