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
                Schema::create('pivot_user_conges', function (Blueprint $table) {
            $table->id();
            $table->string('debut', 25);
            $table->string('jour', 10)->default('1');
            $table->string('montant', 25);
            $table->timestamps();
            $table->string('employe_id')->nullable();
            $table->foreignId('conge_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('statut_id')->default(1)->constrained('statuts')->onDelete('set default');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_user_conges');
    }
};
