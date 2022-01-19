<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('menu_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained();
            $table->integer('day_number');
            $table->string('name', 50);
            $table->string('description', 1000);
            $table->json('content');
            $table->json('info');
            $table->foreignId('menu_type_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_days');
    }
}
