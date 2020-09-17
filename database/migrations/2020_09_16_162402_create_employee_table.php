<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_employee', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('dept_id')->unsigned(); 
            $table->foreign('dept_id')->references('id')->on('table_department');

            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100);

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
        Schema::dropIfExists('table_employee');
    }
}
