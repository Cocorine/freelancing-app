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
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('pseudo')->nullable();
            $table->string('compagny')->nullable();
            $table->boolean('active')->default(0);
            $table->string('gender')->nullable();
            $table->longText('profil_description')->nullable();
            $table->integer('experience')->default(0);
            $table->string('hire_price')->nullable();
            $table->integer('ratings')->default(0);
            $table->string('profil')->nullable();
            $table->string('telephone')->nullable();
            $table->string('price_type')->nullable();
            $table->boolean('verified')->default(0);
            $table->string('identity')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('country_id')->nullable()
                    ->constrained('countries')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignId('plan_id')->nullable()
            ->constrained('plans')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
    }
}
