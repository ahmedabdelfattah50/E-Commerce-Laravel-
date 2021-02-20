<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Languages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages',function (Blueprint $table){
            $table -> id();
            $table -> string('abbr',10);
            $table -> string('locale',20);
            $table -> string('name',100);
            $table -> string('native',20);
            $table -> enum('direction', ['rtl', 'ltr'])->default('rtl');
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
        Schema::dropIfExists('languages');
    }
}
