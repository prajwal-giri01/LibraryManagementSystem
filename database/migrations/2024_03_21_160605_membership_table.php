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
        Schema::create("membershipTable", function (Blueprint $table){
            $table->id();
            $table->String("membershipLevel")->unique();
            $table->integer("numberOfBooks");
            $table->integer("cId")->nullable();
            $table->integer("uId")->nullable();
            $table->boolean("idDeleted")->default(0);
            $table->timestamps();
            $table->String("Extra")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("membershipTable");
    }
};
