<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('slug');
                $table->text('description');
                $table->unsignedBigInteger('finish_day');
                $table->float('published_budget',12,2)->default(0);
                $table->string('attachment')->nullable();
                $table->boolean('is_expire')->default(false);
                $table->unsignedBigInteger('category_id');
                $table->timestamps();

                if (Schema::hasTable('categories')) {
                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                }
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
        Schema::dropIfExists('projects');
    }
}
