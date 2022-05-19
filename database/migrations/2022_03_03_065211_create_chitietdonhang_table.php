<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->string('id_donhang',50)->index();
            $table->foreign('id_donhang')->references('id_donhang')->on('donhang')->onDelete('cascade');
            $table->bigInteger('id_sp')->unsigned()->index();
            $table->foreign('id_sp')->references('id_sp')->on('sanpham')->onDelete('cascade');
            $table->integer('soluong');
            $table->integer('dongia');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
