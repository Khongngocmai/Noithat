<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantrivienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantrivien', function (Blueprint $table) {
            $table->id('id_qtv');
            $table->string('hoten');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('matkhau');
            $table->integer('quyen')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('quantrivien');
    }
}
