<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksoalAdaptifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoal_adaptif', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('matpel_id');
            $table->string('code');
            $table->string('name');
            $table->integer('max_pg');

            $table->index(['matpel_id']);
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
        Schema::dropIfExists('banksoal_adaptif');
    }
}