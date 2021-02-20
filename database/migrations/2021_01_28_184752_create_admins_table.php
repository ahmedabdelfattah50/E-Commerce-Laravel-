<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{

    // build the table of admin
    public function up(){
        Schema::create('admins',function (Blueprint $table){
            $table -> id();
            $table -> string('name')[100];
            $table -> string('email')[100];
            $table -> string('password')[255];
            $table -> string('photo')[255];
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
        Schema::dropIfExists('admins');
    }
}


