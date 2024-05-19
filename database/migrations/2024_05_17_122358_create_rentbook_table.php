<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('rentbook', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger("book_id");
            $table->foreign("book_id")->references("id")->on("book")->onDelete('cascade');
            $table->timestamp('startingDate')->useCurrent();
            $table->timestamp('endingDate')->nullable();
            $table->boolean('isDamaged')->default(0);
            $table->boolean('isLate')->default(0);
            $table->integer('penaltyAmount')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->foreign('delivery_id')->references('id')->on('delivery')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentbook');
    }
};
