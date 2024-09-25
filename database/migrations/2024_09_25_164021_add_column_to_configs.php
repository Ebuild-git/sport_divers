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
        Schema::table('configs', function (Blueprint $table) {
            //
         //   $table->text('group')->nullable()->default(null);
            $table->text('designation')->nullable()->default(null);
           // $table->unsignedBigInteger('group_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configs', function (Blueprint $table) {
            //
            //$table->dropColumn('group');
            $table->dropColumn('designation');
           // $table->dropColumn('group_id');
        });
    }
};
