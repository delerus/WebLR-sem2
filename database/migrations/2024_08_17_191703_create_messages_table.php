<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Запускает миграцию.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Поле id
            $table->string('name'); // Поле для имени
            $table->string('email'); // Поле для email
            $table->text('message'); // Поле для текста сообщения
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Откатывает миграцию.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
