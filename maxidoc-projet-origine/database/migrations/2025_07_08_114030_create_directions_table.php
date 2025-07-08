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
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('code', 20)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('lieu_id')->default(12)->constrained('lieu_affectations')->onDelete('cascade');
            $table->foreignId('responsable_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->string('slug', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('adjoint_id')->nullable()->constrained('agents')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directions');
    }
};
