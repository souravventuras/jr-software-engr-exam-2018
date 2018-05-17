<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperProgrammingLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_programming_language', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('developer_id');
            $table->foreign('developer_id')->references('id')->on('developers');
            $table->unsignedInteger('programming_language_id');
            $table->foreign('programming_language_id')->references('id')->on('programming_languages');
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
        Schema::dropIfExists('developer_programming_language');
    }
}
