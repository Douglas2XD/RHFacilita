<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic');
            $table->string('curriculum');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->date('birth_date');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('marital_status');
            $table->integer('children');
            $table->bool('pwd');
           // $table->foreignId("address_id")->constrained();
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
        Schema::dropIfExists('employees');
    }
};
