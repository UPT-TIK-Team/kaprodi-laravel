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
    Schema::create('pemilih', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('username')->nullable();
      $table->string('prodi');
      $table->date('tanggal_lahir');
      $table->string('status')->nullable();
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
    Schema::dropIfExists('pemilih');
  }
};
