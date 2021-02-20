<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('transportasi_id');
            $table->string('tipe');
            $table->string('kursi');
            $table->bigInteger('harga');

            $table->string('asal');
            $table->timestamp('waktu_berangkat')->nullable();

            $table->string('tujuan');
            $table->timestamp('waktu_tiba')->nullable(); 
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutes');
    }
}
