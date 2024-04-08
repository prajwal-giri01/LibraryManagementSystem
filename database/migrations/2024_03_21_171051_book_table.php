<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("book", function (Blueprint $table){
            $table->id();
            $table->string("title")->unique();
            $table->unsignedBigInteger("author");
            $table->foreign("author")->references("id")->on("author")->onDelete('cascade');
            $table->unsignedBigInteger("genre");
            $table->foreign("genre")->references("id")->on("genre")->onDelete('cascade');
            $table->integer("quantity");
            $table->integer("cId")->nullable();
            $table->integer("uId")->nullable();
            $table->boolean("isDeleted")->default(0);
            $table->timestamps();
            $table->string("extra")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("book");
    }
};
