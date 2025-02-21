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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            // تغيير اسم العمود إلى book_id وإضافته كمفتاح أجنبي
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            // ربط العمود book_id بعمود id في جدول books
            $table->foreign('book_id')->nullable()->references('id')->on('books')->onDelete('cascade'); // اختيارياً: للحذف التلقائي عند حذف الكتاب
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
