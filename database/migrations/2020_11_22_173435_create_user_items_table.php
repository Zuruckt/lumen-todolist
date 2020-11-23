<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserItemsTable extends Migration
{
    public function up()
    {
        Schema::create('user_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->dateTime('due_date');
            $table->boolean('done')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_items');
    }
}
