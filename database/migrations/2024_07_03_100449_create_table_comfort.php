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
        Schema::create('comforts', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->timestamps();
        });
        Schema::create('role_has_comfort', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreignId('comfort_id');
            $table->foreign('comfort_id')
                ->references('id')
                ->on('comforts')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_has_comfort');
        Schema::dropIfExists('comforts');
    }
};
