<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('gambar1');
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->string('deskripsi');
            $table->string('komposisi');
            $table->string('manfaat');
            $table->integer('isi');
            $table->integer('isi2')->nullable();
            $table->integer('isi3')->nullable();
            $table->integer('isi4')->nullable();
            $table->integer('harga');
            $table->integer('harga2')->nullable();
            $table->integer('harga3')->nullable();
            $table->integer('harga4')->nullable();
            $table->unsignedBigInteger('penjual');
            $table->foreign('penjual')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
