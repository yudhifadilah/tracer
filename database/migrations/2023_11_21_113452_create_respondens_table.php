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
        Schema::create('respondens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('surveys_id');
            $table->string('nama_responden');
            $table->date('lulusan');
            $table->enum('status_bekerja',["bekerja", "belum"])->default("belum");
            $table->string('nama_kantor');
            $table->string('posisi');

            $table->foreign('surveys_id')->references('id')->on('surveys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
