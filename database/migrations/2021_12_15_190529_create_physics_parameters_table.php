<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicsParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('physics_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('training_id')->constrained();
            $table->integer('phase_number');
            $table->json('photoes');
            $table->float('weight');
            $table->float('height');
            $table->float('dream_weight');
            $table->float('current_weight');
            $table->float('hips_cm');
            $table->float('waist_cm');
            $table->float('chest_cm');
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
        Schema::dropIfExists('physics_parameters');
    }
}
