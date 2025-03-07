<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courrier_entrants', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_piece');
            $table->date('date_reception');
            $table->string('expediteur');
            $table->string('objet');
            $table->text('pieces_jointes')->nullable();
            $table->string('no_archive')->nullable(); // Ajout du champ no_archive
            $table->text('description')->nullable(); // Ajout du champ pieces_jointes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courrier_entrants');
    }
};
