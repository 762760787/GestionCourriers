<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courrier_sortants', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_piece');
            $table->date('date_envoi');
            $table->string('destinataire');
            $table->string('objet');
            $table->text('pieces_jointes')->nullable(); // Ajout du champ pieces_jointes
            $table->string('no_archive')->nullable(); // Ajout du champ no_archive
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courrier_sortants');
    }
};
