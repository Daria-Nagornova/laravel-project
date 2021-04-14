<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('comments', function (Blueprint $table) {
            Schema::table('categories', function (Blueprint $table) {
                $table->tinyInteger('id');
                $table->string('name', 100);
                $table->string('description', 1000);
            });
        });
    }
}
