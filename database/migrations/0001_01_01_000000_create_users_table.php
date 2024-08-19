<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_users_table.php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('username')->unique();
        $table->string('email')->unique();
        $table->string('password');
        $table->string('phone_number')->nullable();
        $table->string('profile_picture')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('users');
}

};
