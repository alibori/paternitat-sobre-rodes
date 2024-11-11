<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->enum('status', ['draft', 'reviewing', 'published', 'rejected', 'scheduled'])->default('draft')->change();
            $table->timestamp('publish_on')->nullable()->after('status');
            $table->timestamp('published_at')->nullable()->after('publish_on');
        });

        DB::statement('UPDATE posts SET published_at = created_at WHERE status = "published"');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table): void {
            $table->enum('status', ['draft', 'reviewing', 'published', 'rejected'])->default('draft')->change();
            $table->dropColumn('publish_on');
            $table->dropColumn('published_at');
        });
    }
};
