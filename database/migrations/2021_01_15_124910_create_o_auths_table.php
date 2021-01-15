<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_auths', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('client_id')->nullable();
            $table->string('secret_key')->nullable();
            $table->integer('login_counter')->default(0);
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
        Schema::dropIfExists('o_auths');
    }
}
