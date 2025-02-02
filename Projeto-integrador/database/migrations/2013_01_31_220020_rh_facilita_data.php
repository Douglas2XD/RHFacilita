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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->timestamps();            
        });
        
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic');
            $table->string('curriculum');
            $table->string('name');
            $table->string('cpf', 14);
            $table->string('rg', 20);
            $table->date('birth_date');
            $table->string('email');
            $table->string('phone', 30);
            $table->string('gender', 20);
            $table->string('marital_status', 50);
            $table->integer('children');
            $table->boolean('pwd'); // Pessoa com deficiência
            $table->timestamps();
            $table->unsignedBigInteger('add_by')->nullable(); // ID do usuário que adicionou
        });

        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
            $table->unsignedBigInteger('employee_id')->nullable(); // Alterado para unsignedBigInteger
            $table->integer('number')->nullable();

            // Definindo chave estrangeira para a tabela employees
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pdf_candidate');
            $table->timestamps();
            $table->string('email');
        });

        Schema::create('candidate_vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('vacancy_id');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name_department')->nullable();
            $table->timestamps();
        });

        Schema::create('professional_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // Chave estrangeira para a tabela employees
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('position')->nullable();
            $table->date('admission_date')->nullable();
            $table->enum('employee_stats', ['ativo', 'inativo'])->default('ativo');
            $table->string('CTPS_number')->nullable();
            $table->string('CTPS_series')->nullable();
            $table->string('PIS_PASEP')->nullable();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

        Schema::create('monthly_movements', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->integer('hires')->default(0);
            $table->integer('terminations')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Adiciona a coluna user_id com a chave estrangeira
            $table->timestamps();
        });

        Schema::create('terminations', function (Blueprint $table) { // Alterado para 'terminations'
            $table->id();
            $table->date('dismissal_date');
            $table->string('reason');
            $table->string('notice_period')->nullable();
            $table->text('comments')->nullable();
            $table->text('materials_returned')->nullable();
            $table->text('documents_returned')->nullable();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('email')->nullable();
            $table->string('name_department')->nullable();
            $table->string('position')->nullable();
            $table->float('salary', 10, 2)->nullable();
            $table->date('hire_date')->nullable();
            $table->unsignedBigInteger('removed_by')->nullable();
        });

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como AUTO_INCREMENT
            $table->string('title');
            $table->string('description', 10000);
            $table->string('requirements', 1000);
            $table->string('remuneration');
            $table->string('contract_type');
            $table->string('location');
            $table->string('benefits', 1000)->nullable();
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('terminations');
        Schema::dropIfExists('monthly_movements');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('candidate_vacancies');
        Schema::dropIfExists('candidate');
        Schema::dropIfExists('address');
    }
};
