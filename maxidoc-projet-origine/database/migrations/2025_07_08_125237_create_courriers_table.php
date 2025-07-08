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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('type_id')->nullable()->constrained('courrier_types')->onDelete('set null');
            $table->integer('exped_externe')->nullable();
            $table->foreignId('exped_interne_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->foreignId('dest_externe_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->foreignId('dest_interne_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->foreignId('service_traitant_id')->nullable()->constrained('services')->onDelete('set null');
            $table->boolean('is_intern')->default(true);
            $table->text('title')->nullable();
            $table->integer('confidentiel')->nullable();
            $table->string('reference_courrier', 200)->nullable();
            $table->string('reference_interne', 200)->nullable();
            $table->foreignId('priorite_id')->nullable()->constrained('priorites')->onDelete('set null');
            $table->timestamp('date_du_courrier')->useCurrent()->nullable();
            $table->timestamp('date_arrive')->nullable();
            $table->date('date_fin')->nullable();
            $table->foreignId('nature_id')->nullable()->constrained('courrier_natures')->onDelete('set null');
            $table->text('objet')->nullable();
            $table->integer('copie')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('courrier_categories')->onDelete('set null');
            $table->boolean('is_classified')->default(false);
            $table->foreignId('traitement_id')->nullable()->constrained('courrier_traitements')->onDelete('set null');
            $table->integer('created_by')->nullable();
            $table->integer('parent_id')->nullable();
            $table->foreignId('statut_id')->nullable()->constrained('statuts')->onDelete('set null');
            $table->timestamps();
            $table->boolean('mark_as_done')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courriers');
    }
};
