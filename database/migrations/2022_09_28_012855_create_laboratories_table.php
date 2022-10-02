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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by');
            $table->string('name');
            $table->string('registration');
            $table->string('address');
            $table->string('admin_name');
            $table->string('contact');
            $table->string('logo')->nullable();
            $table->string('module')->nullable();
            $table->string('email');
            $table->string('cnic')->nullable();
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
        Schema::dropIfExists('laboratories');
    }
};
