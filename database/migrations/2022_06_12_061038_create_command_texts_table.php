<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_texts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('command_id'); // forign key
            $table->foreign('command_id')->references('command_id')->on('commands')->constrained();
            $table->text('content');
            $table->integer('lang');
            $table->string('status');
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
        Schema::dropIfExists('command_texts');
    }
};
