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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nom')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('telephone')->nullable();
            $table->string('sujet')->nullable();
            $table->integer("age")->nullable();
          // $table->text('group')->nullable()->default(null);
            $table->enum("group",["externe","interne"])->default("interne");
            $table->text('designation')->nullable()->default(null);
            $table->unsignedBigInteger('group_id')->nullable();

           
            $table->enum("gender",["FEMALE","MALE"])->default("MALE");
            $table->string('email');
            $table->text('message')->nullable();
            $table->string('ville')->nullable();
            $table->integer("cin")->nullable();
            $table->date("birthdate")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
