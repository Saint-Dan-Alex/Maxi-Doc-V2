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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('direction_id')->nullable()->constrained('directions')->onDelete('set null');
            $table->string('responsable_id')->nullable();
            $table->foreignId('statut_id')->default(1)->constrained('statuts')->onDelete('set default');
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
        Schema::dropIfExists('divisions');
    }
};
