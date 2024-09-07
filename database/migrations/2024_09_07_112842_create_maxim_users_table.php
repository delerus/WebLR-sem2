<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('login', 255);
            $table->string('password', 255);
            $table->string('email', 255);
            $table->string('name', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_data');
    }
};
