<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTables extends Migration
{
    /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
      Schema::create('agents', function (Blueprint $table) {
          $table->increments('id');
          $table->string('userguid', 64)->unique();
          $table->string('password', 10)->nullable();
          $table->tinyInteger('is_featured')->nullable()->default(0);
          $table->tinyInteger('rating')->nullable()->default(0);
          $table->tinyInteger('active')->nullable()->default(0);
          $table->string('first_name', 32)->nullable()->default('');
          $table->string('last_name', 32)->nullable();
          $table->string('agency_name')->nullable();
          $table->string('city', 32)->nullable();
          $table->string('state_province', 32)->nullable();
          $table->string('postal_code', 32)->nullable();
          $table->string('country', 32)->nullable();
          $table->string('phone', 32)->nullable();
          $table->string('email', 64)->nullable();
          $table->string('course_status', 16)->nullable();
          $table->string('date_enrolled', 16)->nullable();
          $table->string('date_completed', 16)->nullable();
          $table->string('dob', 16)->nullable();
          $table->string('image_path')->nullable();
          $table->string('image_url')->nullable();
          $table->string('webpage')->nullable();
          $table->integer('bookings')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->index('postal_code');
          $table->index('email');
      });

      Schema::create('geo_zips', function (Blueprint $table) {
          $table->increments('id');
          $table->string('zip', 16)->nullable();
          $table->string('zip_type', 32)->nullable();
          $table->string('city', 32)->nullable();
          $table->string('state', 3)->nullable();
          $table->decimal('latitude', 5, 2)->nullable();
          $table->decimal('longitude', 5, 2)->nullable();
          $table->index(['zip', 'latitude', 'longitude']);
      });

      Schema::create('precise_geo_zips', function (Blueprint $table) {
          $table->increments('id');
          $table->string('zip', 16)->nullable();
          $table->decimal('latitude', 10, 6)->nullable();
          $table->decimal('longitude', 10, 6)->nullable();
          $table->index(['zip', 'latitude', 'longitude']);
      });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
      Schema::dropIfExists('agents');
      Schema::dropIfExists('geo_zips');
      Schema::dropIfExists('precise_geo_zips');
  }
}
