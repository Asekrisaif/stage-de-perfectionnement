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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nomLocal');
            $table->string('adresseLocal');
            $table->integer('contactLocal');
            $table->foreignId('region_id');
            $table->foreignId('utilisateur_id');
            $table->foreignId('famille_id');
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
            $table->foreign('famille_id')->references('id')->on('familles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
};
