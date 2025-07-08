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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('statut_id')->default(1)->constrained('statuts')->onDelete('set default');
            $table->foreignId('tache_statut_id')->default(1)->constrained('taches_statuts')->onDelete('set default');
            $table->foreignId('priorite_id')->nullable()->constrained('priorites')->onDelete('set null');
            $table->foreignId('parent_id')->nullable()->constrained('taches')->onDelete('set null');
            $table->string('titre')->nullable();
            $table->integer('pourcentage')->default(0);
            $table->text('description')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('courrier_id')->nullable()->constrained('courriers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taches');
    }
};
