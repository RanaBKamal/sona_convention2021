<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitedSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invited_speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('designation', 100)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('image', 100)->nullable();
            $table->integer('display_order')->default(1);
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
        Schema::dropIfExists('invited_speakers');
    }
}
