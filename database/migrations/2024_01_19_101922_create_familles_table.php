<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familles', function (Blueprint $table) {
            $table->id();
            $table->string('nomFamille');
            //$table->foreignId('famille_id');
            $table->timestamps();
            //$table->foreign('famille_id')->references('id')->on('familles');
            $table->unsignedBigInteger('famille_id')->nullable(); // permettre la nullité
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('familles');
    }
};
