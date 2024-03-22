<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id(); // ID (Primary Key, INT)
            $table->unsignedBigInteger('user_id'); // UserID (Foreign Key, INT)
            $table->unsignedBigInteger('book_id'); // BookID (Foreign Key, INT)
            $table->integer('cId')->nullable(); // CId (INT)->null
            $table->integer('uId')->nullable(); // UId (INT)->null
            $table->boolean('isDeleted')->default(0); // isdeleted(boolean)default(0)
            $table->String('extra')->nullable(); // ExtraInfo (TEXT)->null

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
};
