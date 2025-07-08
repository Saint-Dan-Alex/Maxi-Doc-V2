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
        Schema::create('courriers_traitements_agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courrier_id')->nullable()->constrained('courriers')->onDelete('cascade');
            $table->foreignId('traitement_id')->nullable()->constrained('courrier_traitements')->onDelete('cascade');
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
        Schema::dropIfExists('courriers_traitements_agents');
    }
};
