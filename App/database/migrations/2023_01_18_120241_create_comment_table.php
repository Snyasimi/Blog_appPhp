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
        Schema::create('comment', function (Blueprint $table) {
		$table->id();

        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');

		$table->unsignedBigInteger('blog_id');
		$table->foreign('blog_id')->references('id')->on('blog')->onDelete('cascade');

		$table->integer('likes',0);
		$table->string('comment',255);

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
        Schema::dropIfExists('comment');
    }
};
