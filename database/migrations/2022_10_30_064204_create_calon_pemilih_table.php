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
        Schema::create('calon_pemilih', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_id')->constrained('calon')->onDelete('cascade');
            $table->foreignId('pemilih_id')->constrained('pemilih')->onDelete('cascade');
            $table->integer('suara')->nullable();
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
        Schema::dropIfExists('calon_pemilih');
    }
};
