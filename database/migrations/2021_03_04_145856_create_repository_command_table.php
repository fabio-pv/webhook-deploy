<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoryCommandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository_command', function (Blueprint $table) {

            $table->unsignedBigInteger('repository_id');
            $table->foreign('repository_id')
                ->references('id')
                ->on('repositories');

            $table->unsignedBigInteger('command_id');
            $table->foreign('command_id')
                ->references('id')
                ->on('commands');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repository_command');
    }
}
