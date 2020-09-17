<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_employee_contact', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('emp_id')->unsigned(); 
            $table->foreign('emp_id')->references('id')->on('table_employee');

            $table->text('address');
            $table->string('contact_number',30);
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
        Schema::dropIfExists('table_employee_contact');
    }
}
