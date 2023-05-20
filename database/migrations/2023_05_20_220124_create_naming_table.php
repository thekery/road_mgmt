<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamingTable extends Migration
{
    public function up()
    {
        Schema::create('namings', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('namings');
    }
}
