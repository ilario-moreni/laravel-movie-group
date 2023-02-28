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
            $table->string('title', 50);
            $table->string('original_title', 50)->nullable();
            $table->string('nationality', 20)->nullable();
            $table->date('release_date');
            $table->decimal('vote', 2, 1);
            $table->string('cast', 300)->nullable();
            $table->string('cover_path', 200)->nullable();
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
