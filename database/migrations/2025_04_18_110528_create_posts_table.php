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
            $table->id();

            // Ahora ambos son nullable y con onDelete('set null')
            $table->foreignId('video_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('podcasts_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('slug')->default('');
            $table->text('body');
            $table->string('image')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->nullable()->default(null);
            $table->timestamps();
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
