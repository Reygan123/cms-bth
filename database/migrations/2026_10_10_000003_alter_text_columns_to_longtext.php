<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Alter posts content and description to longText
        DB::statement('ALTER TABLE `posts` MODIFY `content` LONGTEXT NULL');
        DB::statement('ALTER TABLE `posts` MODIFY `description` LONGTEXT NULL');

        // Check if programs content or description need longText
        if (Schema::hasTable('programs')) {
            DB::statement('ALTER TABLE `programs` MODIFY `content` LONGTEXT NULL');
            DB::statement('ALTER TABLE `programs` MODIFY `description` LONGTEXT NULL');
        }

        // Check if abouts content or description need longText
        if (Schema::hasTable('abouts')) {
            DB::statement('ALTER TABLE `abouts` MODIFY `content` LONGTEXT NULL');
            DB::statement('ALTER TABLE `abouts` MODIFY `description` LONGTEXT NULL');
        }

        // Check if agendas content need longText
        if (Schema::hasTable('agendas')) {
            DB::statement('ALTER TABLE `agendas` MODIFY `content` LONGTEXT NULL');
        }

        // Check if unggulans description need longText
        if (Schema::hasTable('unggulans')) {
            DB::statement('ALTER TABLE `unggulans` MODIFY `description` LONGTEXT NULL');
        }
    }

    public function down()
    {
        //
    }
};
