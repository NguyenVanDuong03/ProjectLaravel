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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('name');
            $table->enum('gender', ['Nam', 'Nữ', 'Bí mật']);
            $table->date('birthday');
            $table->string('phone');
            // $table->timestamps(); Nếu ko có thì vào Model tương ứng gõ public $timestamps = false;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
