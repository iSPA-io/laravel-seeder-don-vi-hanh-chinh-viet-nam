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
        $table->integer('parent_id')->references('id')->on('provinces')->onDelete('cascade');
        //  Uncomment this line if you haven't used any language table
        $table->integer('language_id')->references('id')->on('languages')->onDelete('cascade');

        $table->string('maps_id')->nullable()->comment('Google Maps ID - Dev only');
        $table->char('longitude')->nullable();
        $table->char('latitude')->nullable();
        $table->tinyInteger('priority')->default(0);
        $table->longText('config')->nullable()->comment('json object configure');
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
