<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamp('tanggal')->useCurrent();
            $table->date('dari_tanggal');
            $table->date('sampai_tanggal');
            $table->integer('total_hari')->nullable();

            $table->unsignedBigInteger('bagian_id')->nullable();
            $table->foreign('bagian_id')->references('id')->on('bagians')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('jabatan_id')->nullable();;
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('keterangan');
            $table->integer('status')->default(0);

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
        Schema::dropIfExists('cutis');
    }
}