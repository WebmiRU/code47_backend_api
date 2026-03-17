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
        Schema::create('project_m2m_right', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedBigInteger('right_id')->index();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('project')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('right_id')
                ->references('id')
                ->on('right')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_m2m_right');
    }
};
