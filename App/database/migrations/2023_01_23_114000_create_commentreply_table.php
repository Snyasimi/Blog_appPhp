<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentreply', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ParentComment');
            $table->foreign('ParentComment')->references('id')->on('comment')->onDelete('cascade');
            
            $table->integer('ChildComment')->nullable();
            $table->string('Content');
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
        Schema::dropIfExists('commentreply');
    }
};
