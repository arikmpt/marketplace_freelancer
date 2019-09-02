<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->uuid('uuid');
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->string('name')->nullable();
                $table->date('birthdate')->nullable();
                $table->string('gender')->nullable();
                $table->text('address')->nullable();
                $table->string('state')->nullable();
                $table->string('city')->nullable();
                $table->string('district')->nullable();
                $table->string('sub_district')->nullable();
                $table->unsignedBigInteger('postal_code')->nullable();
                $table->string('phone')->nullable();
                $table->text('about')->nullable();
                $table->boolean('is_admin')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
