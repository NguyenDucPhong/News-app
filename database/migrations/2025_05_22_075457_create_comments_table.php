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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Nullable nếu cho khách bình luận
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // Cho nested comments
            $table->string('author_name')->nullable(); // Nếu cho khách
            $table->string('author_email')->nullable(); // Nếu cho khách
            $table->string('author_website')->nullable();
            $table->text('content');
            $table->boolean('approved')->default(false);
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
