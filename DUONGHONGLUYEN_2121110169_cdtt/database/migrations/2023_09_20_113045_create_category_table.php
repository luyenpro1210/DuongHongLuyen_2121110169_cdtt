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
        Schema::create('dhl_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('slug',1000)->nullable();
            $table->unsignedInteger('parent_id')->defaut(0);
            $table->unsignedInteger('sort_order')->defaut(1);
            $table->unsignedTinyInteger('level')->defaut(1);
            $table->string('metakey');
            $table->string('metadesc');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status')->defaut(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dhl_category');
    }
};
