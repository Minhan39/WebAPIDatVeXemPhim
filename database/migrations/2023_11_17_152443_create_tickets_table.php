<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->bigInteger('number_tickets');
            $table->string('seat');
            $table->unsignedBigInteger('cinema_id');
            $table->date('openning_day');
            $table->time('show_time');
            $table->float('vat');
            $table->unsignedBigInteger('combo_id');
            $table->bigInteger('number_combos');
            $table->timestamps();

            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->foreign('combo_id')->references('id')->on('combos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
