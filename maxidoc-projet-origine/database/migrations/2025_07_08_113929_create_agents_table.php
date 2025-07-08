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
       Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('lieu_id')->nullable();
            $table->foreignId('direction_id')->nullable();
            $table->foreignId('section_id')->nullable();
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('statut_id')->nullable();
            $table->string('nom', 25)->nullable();
            $table->string('post_nom', 25)->nullable();
            $table->string('prenom', 25)->nullable();
            $table->char('sexe', 1)->nullable();
            $table->string('lieu_naiss', 200)->nullable();
            $table->date('date_naiss')->nullable();
            $table->string('province', 255)->nullable();
            $table->string('ville', 255)->nullable();
            $table->string('etat_civil', 25)->nullable();
            $table->foreignId('division_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->foreignId('fonction_id')->nullable();
            $table->tinyInteger('nbr_enfant')->nullable();
            $table->string('nationalite', 100)->nullable();
            $table->string('matricule', 20)->nullable();
            $table->string('image', 50)->nullable();
            $table->string('slug', 255)->nullable();
            $table->foreignId('created_by')->nullable();
            $table->integer('delegue_id')->nullable();
            $table->foreignId('updated_by')->nullable();
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
        Schema::dropIfExists('agents');
    }
};
