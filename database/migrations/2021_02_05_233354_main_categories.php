<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MainCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories',function (Blueprint $table){
            $table -> id();
            $table -> string('name',150);
            $table -> string('translation_lang',10);
            $table -> integer('translation_of');
            $table -> string('slug',150);
            $table -> string('photo',150)->nullable();
            $table -> tinyInteger('active')->default("1");
            $table -> timestamp('created_at')->nullable();
            $table -> timestamp('updated_at')->nullable();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('main_categories');
    }
}
