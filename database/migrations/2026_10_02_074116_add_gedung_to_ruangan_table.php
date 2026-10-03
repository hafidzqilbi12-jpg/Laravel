<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ruangan', function (Blueprint $table): void {
            $table->string('gedung', 100)->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('ruangan', function (Blueprint $table): void {
            $table->dropColumn('gedung');
        });
    }
};