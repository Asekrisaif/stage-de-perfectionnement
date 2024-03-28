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
        Schema::create('compteurs', function (Blueprint $table) {
            $table->id();
            $table->double('moyConsommation');
            $table->integer('numSerie');
            $table->string('modele');
            $table->date('dateInstallation');
            $table->string('marque');
            $table->unsignedBigInteger('typecompteur_id');
            $table->unsignedBigInteger('local_id')->nullable();
            $table->timestamps();
            $table->foreign('typecompteur_id')->references('id')->on('type_compteurs');
            $table->foreign('local_id')->references('id')->on('locals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compteurs');
    }
};
