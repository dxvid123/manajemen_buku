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
        if (!Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('category_id');
                if (Schema::hasTable('categories')) {
                    $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
                }
                $table->string('judul');
                $table->string('penulis');
                $table->integer('tahun_terbit');
                $table->integer('stok');
                $table->string('cover_image')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('books', function (Blueprint $table) {
                if (!Schema::hasColumn('books', 'cover_image')) {
                    $table->string('cover_image')->nullable()->after('stok');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
};
