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
            $table->unsignedInteger('developer_id');
            $table->unsignedInteger('programming_language_id');
            $table->primary(['developer_id', 'programming_language_id'], 'developer_programming_language_primary');
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->foreign('programming_language_id')->references('id')->on('programming_languages')->onDelete('cascade');
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
