<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('images');
            $table->string('phone_number');
            $table->string('address');
            $table->string('email');
            $table->string('branch');
            $table->integer('gender');
            $table->string('academic_level');
            $table->string('identity');
            $table->string('position');
            $table->date('year_of_birth');
            $table->integer('department_id');
            $table->integer('branch_id');
            $table->string('note');
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
        Schema::dropIfExists('staff');
    }
}
