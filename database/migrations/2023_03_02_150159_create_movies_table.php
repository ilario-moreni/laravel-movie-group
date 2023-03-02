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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 90)->unique();
            $table->string('original_title', 50)->nullable();
            $table->string('slug', 100);
            $table->string('nationality', 20)->nullable();
            $table->date('release_date');
            $table->float('vote', 3, 1);
            $table->text('cast', 500)->nullable();
            $table->string('cover_path', 200)->nullable();
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
        Schema::dropIfExists('movies');
    }
};