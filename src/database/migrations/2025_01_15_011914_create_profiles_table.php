<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        /**
     * Run the migrations.
     *
     * @return void
     */
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('name')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address')->nullable();
            $table->string('building')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
    /**
     * Reverse the migrations.
     *
     * @return void
     */
        Schema::dropIfExists('profiles');
    }
}
