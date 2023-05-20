<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtentTable extends Migration
{
    public function up()
    {
        Schema::create('extents', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extents');
    }
}
