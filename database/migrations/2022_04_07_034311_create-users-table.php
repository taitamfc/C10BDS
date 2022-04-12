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
        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthday');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->date('start_day');
            $table->unsignedBigInteger('users_group_id');
            $table->foreign('users_group_id')->references('id')->on('user_groups');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
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
        //
    }
};
