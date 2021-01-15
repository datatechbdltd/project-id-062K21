<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adder_id');
            $table->foreignId('updater_id')->nullable();
            $table->foreignId('language_code');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('icon')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('attachment_file')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('visitor_counter')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('services');
    }
}
