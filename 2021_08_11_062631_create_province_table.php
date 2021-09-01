<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProvincesTableCreate extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('provinces', function (Blueprint $table) {
        $table->id();
        $table->uuid('uuid')->nullable()->unique();
        $table->string('uid', 10)->nullable()->unique();
        $table->string('name')->nullable()->index();
        $table->string('global_name')->nullable()->index();
        $table->string('slug')->nullable()->index();
        $table->tinyInteger('type')->default(0);
        $table->foreignId('parent_id')->nullable()
          ->references('id')->on('provinces')->onDelete('set null');
        // Please change it
        $table->foreignId('language_id')->nullable()->comment('Default language of country')
          ->references('id')->on('languages')->onDelete('set null');
        $table->string('maps_id')->nullable();
        $table->string('longitude')->nullable();
        $table->string('latitude')->nullable();
        $table->tinyInteger('priority')->default(0);
        $table->text('config')->nullable();
        // Please change it
        $table->foreignId('status_id')->nullable()->references('id')->on('enumerates')->onDelete('set null');
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
    Schema::dropIfExists('provinces');
  }
}
