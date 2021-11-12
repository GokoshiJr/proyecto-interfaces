<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->integer('id_card');
            $table->date('birth_date');
            $table->string('photo')->default('profile.png');
            $table->string('direction');
            $table->string('state');
            $table->string('city');
            $table->boolean('is_admin')->default(false);
            $table->boolean('access')->default(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('programas', function (Blueprint $table) {
            /* $table->engine='InnoDB'; */
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('photo_1');
            $table->string('photo_2');
            $table->string('photo_3');
            $table->string('language');
            $table->string('library');
            $table->string('plugin');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('programas');
    }
}
