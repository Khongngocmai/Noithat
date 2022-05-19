<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('id_sp');
            $table->bigInteger('id_dmsp')->unsigned()->index();
            $table->foreign('id_dmsp')->references('id_dmsp')->on('dmsp')->onDelete('cascade');
            $table->bigInteger('id_ncc')->unsigned()->index();
            $table->foreign('id_ncc')->references('id_ncc')->on('ncc')->onDelete('cascade');
            $table->integer('loai_sp');
            $table->string('ten_sp');
            $table->text('mota')->nullable();
            $table->integer('giatien')->default(0);
            $table->integer('giakhuyenmai')->default(0);
            $table->date('thoigianbatdau')->nullable();
            $table->date('thoigianketthuc')->nullable();
            $table->integer('soluong')->default(0);
            $table->integer('soluongban')->default(0);
            $table->integer('tinhtrang')->default(1);
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
        Schema::dropIfExists('sanpham');
    }
}
