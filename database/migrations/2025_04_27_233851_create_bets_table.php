<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');  // Link to the players table
            $table->foreignId('team_id')->constrained()->onDelete('cascade');    // Link to the teams table
            $table->decimal('amount', 10, 2);  // The amount of the bet
            $table->decimal('odds', 5, 2);     // The odds for the bet
            $table->enum('outcome', ['pending', 'win', 'lose'])->default('pending');  // Outcome of the bet
            $table->timestamps();  // Timestamps for creation and update
        });
    }

    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
