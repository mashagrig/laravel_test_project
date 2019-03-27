<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipmentGym extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::dropIfExists('equipment_gym');
        Schema::create('equipment_gym', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gym_id')->unsigned();
            $table->integer('equipment_id')->unsigned();
            $table->timestamps();
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_gym');
    }
    public function change()
    {
        Schema::table('equipment_gym', function (Blueprint $table) {
//            $table->increments('id');
         //   $table->integer('gym_id')->unsigned();
          // $table->integer('equipment_id')->unsigned();
           $table->boolean('equipment_checked');
//            $table->timestamps();
            $table->foreign('gym_id')->references('id')->on('gyms')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('restrict')->onUpdate('restrict');
        });    }
}
