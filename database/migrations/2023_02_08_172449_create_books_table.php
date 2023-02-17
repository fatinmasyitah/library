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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('categoryID');
            $table->bigInteger('publisherID');
            $table->bigInteger('authorID');
            $table->string('booktitle');
            $table->boolean('type')->comment('0 => fiction, 1 => non-fiction');
            $table->string('bookweight');
            $table->text('description');
            $table->string('bookimage');
            $table->string('fictionsub');
            $table->string('nonfictionsub');
            $table->integer('status');
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
        Schema::dropIfExists('books');
    }
};
