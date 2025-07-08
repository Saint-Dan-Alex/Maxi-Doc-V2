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
        Schema::create('assistanats', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100);
            $table->foreignId('direction_id')->nullable();
            $table->foreignId('responsable_id')->nullable();
            $table->boolean('for_dg')->default(false);
            $table->boolean('for_dga')->default(false);
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
        Schema::dropIfExists('assistanats');
    }
};
