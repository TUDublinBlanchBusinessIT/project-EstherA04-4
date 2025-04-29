// database/migrations/2025_04_28_000002_create_players_table.php

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
            $table->foreignId('team_id')->constrained('teams');
            $table->string('position');
            $table->integer('age');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
