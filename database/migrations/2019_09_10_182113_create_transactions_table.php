<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('winner_id');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('unique_code');
            $table->float('fee_percentage');
            $table->unsignedBigInteger('fee_price');
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_confirmation')->default(0);
            $table->boolean('is_reject')->default(0);
            $table->timestamps();

            if (Schema::hasTable('projects')) {
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            }

            if (Schema::hasTable('users')) {
                $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            }

            if (Schema::hasTable('users')) {
                $table->foreign('winner_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
