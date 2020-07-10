<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banksoals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_banksoal', 100);
            $table->integer('jumlah_soal')->comment('jumlah soal pilihan ganda');
            $table->integer('jumlah_pilihan')->comment('jumlah pilihan / opsi pada pilihan ganda');
            $table->integer('jumlah_soal_esay')->default('0')->nullable();
            $table->unsignedBigInteger('matpel_id');
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('directory_id');

            $table->foreign('matpel_id')->references('id')->on('matpels')->onDelete('cascade');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('directory_id')->references('id')->on('directories')->onDelete('cascade');
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
        Schema::dropIfExists('banksoals');
    }
}
