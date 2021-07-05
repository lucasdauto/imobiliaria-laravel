<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /** perfil */
            $table->boolean('lessor')->nullable();
            $table->boolean('lessee')->nullable();

            /** data */
            $table->string('genre')->nullable();
            $table->string('document')->unique();
            $table->string('document_secondary', 20)->nullable();
            $table->string('document_secondary_complement')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('civil_status')->nullable();

            /** income */
            $table->string('occupation')->nullable();
            $table->double('income', 10, 2)->nullable();
            $table->string('company_work')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('complement')->nullable();

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** spouse */
            $table->string('type_of_communion')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_genre')->nullable();
            $table->string('spouse_document')->unique()->nullable();
            $table->string('spouse_document_secondary')->nullable();
            $table->string('spouse_document_secondary_complement')->nullable();
            $table->date('spouse_date_of_birth')->nullable();
            $table->string('spouse_place_of_birth')->nullable();
            $table->string('spouse_civil_status')->nullable();

            /** income spouse */
            $table->string('spouse_occupation')->nullable();
            $table->double('spouse_income',10,2)->nullable();
            $table->string('spouse_company_work')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
