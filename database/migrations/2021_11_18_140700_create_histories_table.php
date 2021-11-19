<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->integer('scoreIE')->default(0);
            $table->integer('scoreSN')->default(0);
            $table->integer('scoreTF')->default(0);
            $table->integer('scorePJ')->default(0);

            $table->integer('scoreR')->default(0);
            $table->integer('scoreI')->default(0);
            $table->integer('scoreA')->default(0);
            $table->integer('scoreS')->default(0);
            $table->integer('scoreE')->default(0);
            $table->integer('scoreC')->default(0);

            $table->integer('finished')->default(0);
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
        Schema::dropIfExists('histories');
    }
}
