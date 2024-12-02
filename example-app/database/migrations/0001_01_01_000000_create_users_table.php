<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCollection extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->create('users', function (Blueprint $collection) {
            $collection->id();
            $collection->string('username');
            $collection->string('email')->unique();
            $collection->string('password'); // Password hashed
            $collection->string('password_plain'); // Password asli
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->drop('users');
    }
}
