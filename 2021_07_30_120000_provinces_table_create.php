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
        $table->char('uid', 10)->nullable()->unique();
        $table->string('name')->nullable()->comment('Local name');
        $table->string('global_name')->nullable();
        $table->string('slug')->nullable()->comment('Global name slug');
        $table->tinyInteger('type')->default(0)->comment('Type of Province (country, city, ward...)');
        $table->integer('parent_id')->default(0);
        $table->integer('language_id')->default(0);
        $table->string('maps_id')->nullable();
        $table->char('longitude')->nullable();
        $table->char('latitude')->nullable();
        $table->tinyInteger('priority')->default(0);
        $table->text('config')->nullable()->comment('json configure');
        $table->boolean('status')->default(false);
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
