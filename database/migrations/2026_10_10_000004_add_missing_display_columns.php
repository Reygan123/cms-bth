<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // 1. programs -> image1
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                if (!Schema::hasColumn('programs', 'image1')) {
                    $table->string('image1')->nullable()->after('image');
                }
            });
            DB::statement('UPDATE `programs` SET `image1` = `image` WHERE `image1` IS NULL AND `image` IS NOT NULL');
        }

        // 2. facilities -> subtitle, program_id
        if (Schema::hasTable('facilities')) {
            Schema::table('facilities', function (Blueprint $table) {
                if (!Schema::hasColumn('facilities', 'subtitle')) {
                    $table->string('subtitle')->nullable()->after('title');
                }
                if (!Schema::hasColumn('facilities', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable()->after('fakultas_display');
                }
            });
        }
    }

    public function down()
    {
        //
    }
};
