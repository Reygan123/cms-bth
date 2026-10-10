<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. ourteams
        if (Schema::hasTable('ourteams')) {
            Schema::table('ourteams', function (Blueprint $table) {
                if (!Schema::hasColumn('ourteams', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable()->after('id');
                }
                if (!Schema::hasColumn('ourteams', 'home')) {
                    $table->string('home')->default('1')->after('image');
                }
            });
        }

        // 2. benefits
        if (Schema::hasTable('benefits')) {
            Schema::table('benefits', function (Blueprint $table) {
                if (!Schema::hasColumn('benefits', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('benefits', 'facility_id')) {
                    $table->unsignedBigInteger('facility_id')->nullable();
                }
            });
        }

        // 3. abouts
        if (Schema::hasTable('abouts')) {
            Schema::table('abouts', function (Blueprint $table) {
                if (!Schema::hasColumn('abouts', 'image1')) {
                    $table->string('image1')->nullable()->after('image');
                }
                if (!Schema::hasColumn('abouts', 'image2')) {
                    $table->string('image2')->nullable()->after('image1');
                }
                if (!Schema::hasColumn('abouts', 'video')) {
                    $table->string('video')->nullable()->after('image2');
                }
            });
        }

        // 4. akademik
        if (!Schema::hasTable('akademik')) {
            Schema::create('akademik', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->longText('description')->nullable();
                $table->date('startDate')->nullable();
                $table->date('endDate')->nullable();
                $table->text('color')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        //
    }
};
