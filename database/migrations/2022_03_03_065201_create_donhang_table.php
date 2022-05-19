<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->string('id_donhang', 50)->primary();
            $table->bigInteger('id_nguoidung')->unsigned()->index();
            $table->foreign('id_nguoidung')->references('id_nguoidung')->on('nguoidung')->onDelete('cascade');
            $table->bigInteger('id_khuyenmai')->unsigned()->index();
            $table->string('diachi');
            $table->integer('thanhtien');
            $table->integer('tinhtrang')->default(0);
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
        Schema::dropIfExists('donhang');
    }
}
