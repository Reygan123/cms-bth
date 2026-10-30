<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('testimonies')) {
            Schema::table('testimonies', function (Blueprint $table) {
                if (!Schema::hasColumn('testimonies', 'description')) {
                    $table->longText('description')->nullable()->after('slug');
                }
            });

            // Sinkronisasi data existing dari content ke description
            DB::statement('UPDATE `testimonies` SET `description` = `content` WHERE `description` IS NULL AND `content` IS NOT NULL');

            // Jadikan user_id, home, dan fakultas_display nullable dengan default yang aman
            DB::statement('ALTER TABLE `testimonies` MODIFY `user_id` INT UNSIGNED NULL');
            DB::statement('ALTER TABLE `testimonies` MODIFY `home` VARCHAR(255) NULL DEFAULT "1"');
            DB::statement('ALTER TABLE `testimonies` MODIFY `fakultas_display` VARCHAR(255) NULL DEFAULT "1"');
        }
    }

    public function down()
    {
        if (Schema::hasTable('testimonies')) {
            Schema::table('testimonies', function (Blueprint $table) {
                if (Schema::hasColumn('testimonies', 'description')) {
                    $table->dropColumn('description');
                }
            });
        }
    }
};
