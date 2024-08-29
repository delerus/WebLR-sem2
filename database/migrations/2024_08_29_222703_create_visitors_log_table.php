<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visitors_log', function (Blueprint $table) {
            $table->id();
            $table->timestamp('visited_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('page_visited');
            $table->string('ip_address', 45);
            $table->string('host_name')->nullable();
            $table->string('browser_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors_log');
    }

};
