// database/migrations/xxxx_xx_xx_xxxxxx_create_players_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->unsignedBigInteger('team_id'); // Foreign key to teams table
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
