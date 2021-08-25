<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('summary_abstract');
            $table->string('author_information');
            $table->string('presentation_type');
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
        Schema::dropIfExists('work_files');
    }
}
