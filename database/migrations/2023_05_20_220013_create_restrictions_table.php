<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestrictionsTable extends Migration
{
    public function up()
    {
        Schema::create('restrictions', function (Blueprint $table) {
            $table->id();
            $table->string('roadnumber');
            $table->string('frompoint');
            $table->string('topoint');
            $table->string('settlement');
            $table->date('fromdate');
            $table->date('todate');
            $table->unsignedBigInteger('namingid');
            $table->unsignedBigInteger('extentid');
            $table->integer('speed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restrictions');
    }
}
