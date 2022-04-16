<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->longText('milestone')->nullable();
            $table->longText('description')->nullable();
            $table->string('start_at')->nullable();
            $table->string('end_at')->nullable();
            $table->integer('progress')->nullable();
            $table->integer('budget')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('is_pay')->nullable();
            $table->foreignId('project_id')
                    ->constrained('projects')
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
        Schema::dropIfExists('milestones');
    }
}
