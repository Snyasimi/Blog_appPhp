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
        Schema::create('blog', function (Blueprint $table) {

            $table->id();

		    $table->unsignedBigInteger('user_id');
		    $table->foreign('user_id')->references('id')->on('users');	

		    $table->string('blog_title');
	     	$table->string('blog_description');
		    $table->text('blog_body');
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
        Schema::dropIfExists('blog');
    }
};
