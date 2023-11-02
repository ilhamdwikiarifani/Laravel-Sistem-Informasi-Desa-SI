<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanaMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dana_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dana_id');
            $table->decimal('jumlah', 10, 2);
            $table->text('keterangan')->nullable();
            $table->foreignId('user_id');
            $table->timestamp('waktu');
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
        Schema::dropIfExists('dana_masuks');
    }
}
