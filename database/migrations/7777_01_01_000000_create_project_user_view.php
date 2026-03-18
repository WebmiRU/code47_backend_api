<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Создаем View
        DB::statement('
            CREATE OR REPLACE VIEW user_project_actions AS
            SELECT
                "user".id AS user_id,
                "user".login,
                action.key AS action_key,
                project.id AS project_id,
                project.key AS project_key
            FROM
                "user"
            LEFT JOIN user_m2m_user_group ON user_m2m_user_group.user_id = "user".id
            LEFT JOIN user_group ON user_group.id = user_m2m_user_group.user_group_id
            LEFT JOIN project_user_action ON project_user_action.user_id = "user".id
            LEFT JOIN project_user_group_action ON project_user_group_action.user_group_id = user_group.id
            LEFT JOIN project ON project.id = project_user_action.project_id
            LEFT JOIN action ON action.id = project_user_action.action_id
                          OR project_user_group_action.action_id = action.id
        ');
    }

    public function down(): void
    {
        // Удаляем View при откате миграции
        DB::statement('DROP VIEW IF EXISTS user_project_actions');
    }
};
