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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->double('montantFacture');
            $table->integer('periode');
            $table->string('adresse');
            $table->string('nomClient');
            $table->string('adresseClient');
            $table->date('dateFacture');
            $table->date('dateDebutConsommation');
            $table->date('dateFinConsommation');
            $table->double('prixUnitaire');
            $table->double('montantHorsTaxes');
            $table->double('totaleTaxes');
            $table->double('montantTotale');
            $table->date('dateLimitePaiement');
            $table->foreignId('compteur_id');
            $table->timestamps();
            $table->foreign('compteur_id')->references('id')->on('compteurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
};
