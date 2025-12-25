<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('virements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compte_source_id');
            $table->unsignedBigInteger('compte_destination_id');
            $table->decimal('montant', 10, 2);
            $table->string('motif')->nullable();
            $table->timestamp('date_virement')->useCurrent();
            $table->timestamps();

            $table->foreign('compte_source_id')->references('id')->on('comptes')->onDelete('cascade');
            $table->foreign('compte_destination_id')->references('id')->on('comptes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('virements');
    }
};
