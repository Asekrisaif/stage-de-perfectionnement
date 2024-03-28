<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('');
            $table->string('nom');
            $table->string('prenom');
            // Dans le fichier de migration
            // Dans le fichier de migration
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at') -> nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('region_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
