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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('author_id');

            $table->timestamps();
            $table->foreign('book_id')->nullable()->references('id')->on('books'); // اختيارياً: للحذف التلقائي عند حذف الكتاب
            $table->foreign('author_id')->nullable()->references('id')->on('authors'); // اختيارياً: للحذف التلقائي عند حذف الكتاب

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
