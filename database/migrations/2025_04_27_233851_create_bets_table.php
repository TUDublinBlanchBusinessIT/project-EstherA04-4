<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID column
            $table->foreignId('player_id')->constrained()->onDelete('cascade');  // Foreign key referencing players table
            $table->foreignId('team_id')->constrained()->onDelete('cascade');  // Foreign key referencing teams table
            $table->decimal('amount', 10, 2);  // Bet amount with precision and scale (e.g., 99999999.99)
            $table->decimal('odds', 5, 2);  // Odds value with precision and scale (e.g., 2.50)
            $table->enum('outcome', ['win', 'lose', 'pending'])->default('pending');  // Bet outcome with default value of 'pending'
            $table->timestamps();  // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');  // Drop the 'bets' table if it exists
    }
}
