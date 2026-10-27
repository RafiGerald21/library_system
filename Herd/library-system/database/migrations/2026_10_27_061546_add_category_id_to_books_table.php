<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Menambahkan kolom category_id yang berelasi dengan tabel categories
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Menghapus relasi dan kolom jika di-rollback
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};