<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rover', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plateau_id')->index();
            $table->foreign('plateau_id')
                ->references('id')->on('plateaus');

            $table->decimal('x', 10, 7)->nullable(false);
            $table->decimal('y', 10, 7)->nullable(false);
            $table->enum('d', ['N', 'S', 'W', 'E'])->nullable(false);
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
        Schema::dropIfExists('rover');
    }
}
