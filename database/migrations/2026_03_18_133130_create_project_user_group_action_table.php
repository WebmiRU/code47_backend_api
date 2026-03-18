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
        Schema::create('project_user_group_action', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->index();
//            $table->unsignedBigInteger('project_app_id')->index();
            $table->unsignedBigInteger('user_group_id')->index();
            $table->unsignedBigInteger('action_id')->index();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('project')
                ->onUpdate('cascade')
                ->onDelete('cascade');

//            $table->foreign('project_app_id')
//                ->references('id')
//                ->on('project')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');

            $table->foreign('user_group_id')
                ->references('id')
                ->on('user_group')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('action_id')
                ->references('id')
                ->on('action')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user_group_action');
    }
};
