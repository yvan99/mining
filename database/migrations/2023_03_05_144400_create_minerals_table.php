<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minerals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mine_tag');
            $table->integer('quantity');
            $table->string('picture')->nullable();
            $table->text('content')->nullable();
            $table->string('source')->nullable();
            $table->float('weight');
            $table->text('exported_value');
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
        Schema::dropIfExists('minerals');
    }
}
