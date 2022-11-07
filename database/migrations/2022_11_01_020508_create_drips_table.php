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
        Schema::create('drips', function (Blueprint $table) {
            $table->id();
            $table->string('appearance_id');
            $table->string('appearance_title');
            $table->string('drip')->nullable();
            $table->string('personnel_name');
            $table->string('personnel_id');
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
        Schema::dropIfExists('drips');
    }
};
