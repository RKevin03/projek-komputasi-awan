<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('original_filename')->after('category_id')->nullable();
            $table->string('encrypted_filename')->after('original_filename')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('encrypted_filename');
            $table->dropColumn('original_filename');
        });
    }
};
