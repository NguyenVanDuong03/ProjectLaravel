<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->increments('borrowingid');
            $table->unsignedInteger('bookid');
            $table->integer('memberid');
            $table->date('borrowdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('duedate');
            $table->date('returneddate');
            $table->foreign('bookid')->references('bookid')->on('books')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
