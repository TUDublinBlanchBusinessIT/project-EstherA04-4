// database/migrations/xxxx_xx_xx_xxxxxx_create_teams_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Team name
            $table->string('coach'); // Coach name
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
