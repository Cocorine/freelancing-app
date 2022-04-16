<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('price_type')->nullable();
            $table->string('job_type')->nullable();
            $table->string('experience')->nullable();
            $table->string('level')->nullable();
            $table->string('skill_type')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('start_at')->nullable();
            $table->string('hire_at')->nullable();
            $table->string('duree')->nullable();
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->boolean('status')->default(0);
            $table->string('delay')->nullable();

            $table->foreignId('owner')->nullable()
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('country_id')->nullable()
                    ->constrained('countries')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('category_id')->nullable()
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->softDeletes();

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
        Schema::dropIfExists('projects');
    }
}
