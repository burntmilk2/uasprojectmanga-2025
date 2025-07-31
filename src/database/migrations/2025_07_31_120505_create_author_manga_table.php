<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('author_manga', function (Blueprint $table) {
        $table->foreignId('manga_id')->constrained()->onDelete('cascade');
        $table->foreignId('author_id')->constrained()->onDelete('cascade');
        $table->primary(['manga_id', 'author_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_manga');
    }
};
