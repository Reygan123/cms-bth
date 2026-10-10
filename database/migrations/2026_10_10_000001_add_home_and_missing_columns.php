<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to add 'home' and related display columns.
     *
     * @return void
     */
    public function up()
    {
        // 1. organisasis
        if (Schema::hasTable('organisasis')) {
            Schema::table('organisasis', function (Blueprint $table) {
                if (!Schema::hasColumn('organisasis', 'name')) {
                    $table->string('name')->nullable()->after('id');
                }
                if (!Schema::hasColumn('organisasis', 'title')) {
                    $table->string('title')->nullable()->after('name');
                }
                if (!Schema::hasColumn('organisasis', 'description')) {
                    $table->text('description')->nullable()->after('title');
                }
                if (!Schema::hasColumn('organisasis', 'category')) {
                    $table->string('category')->nullable()->after('description');
                }
                if (!Schema::hasColumn('organisasis', 'kategori_id')) {
                    $table->unsignedBigInteger('kategori_id')->nullable()->after('category');
                }
                if (!Schema::hasColumn('organisasis', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable()->after('kategori_id');
                }
                if (!Schema::hasColumn('organisasis', 'image')) {
                    $table->string('image')->nullable()->after('program_id');
                }
                if (!Schema::hasColumn('organisasis', 'image1')) {
                    $table->string('image1')->nullable()->after('image');
                }
                if (!Schema::hasColumn('organisasis', 'home')) {
                    $table->string('home')->default('1')->after('image1');
                }
                if (!Schema::hasColumn('organisasis', 'fakultas_display')) {
                    $table->string('fakultas_display')->default('1')->after('home');
                }
            });
        }

        // 2. facilities
        if (Schema::hasTable('facilities')) {
            Schema::table('facilities', function (Blueprint $table) {
                if (!Schema::hasColumn('facilities', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('facilities', 'fakultas_display')) {
                    $table->string('fakultas_display')->default('1');
                }
            });
        }

        // 3. testimonies
        if (Schema::hasTable('testimonies')) {
            Schema::table('testimonies', function (Blueprint $table) {
                if (!Schema::hasColumn('testimonies', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('testimonies', 'fakultas_display')) {
                    $table->string('fakultas_display')->default('1');
                }
                if (!Schema::hasColumn('testimonies', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable();
                }
            });
        }

        // 4. prestasis
        if (Schema::hasTable('prestasis')) {
            Schema::table('prestasis', function (Blueprint $table) {
                if (!Schema::hasColumn('prestasis', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('prestasis', 'fakultas_display')) {
                    $table->string('fakultas_display')->default('1');
                }
                if (!Schema::hasColumn('prestasis', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable();
                }
                if (!Schema::hasColumn('prestasis', 'tanggal')) {
                    $table->string('tanggal')->nullable();
                }
            });
        }

        // 5. unggulans
        if (Schema::hasTable('unggulans')) {
            Schema::table('unggulans', function (Blueprint $table) {
                if (!Schema::hasColumn('unggulans', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('unggulans', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable();
                }
                if (!Schema::hasColumn('unggulans', 'fakultas')) {
                    $table->string('fakultas')->nullable();
                }
            });
        }

        // 6. sliders
        if (Schema::hasTable('sliders')) {
            Schema::table('sliders', function (Blueprint $table) {
                if (!Schema::hasColumn('sliders', 'home')) {
                    $table->string('home')->default('1');
                }
                if (!Schema::hasColumn('sliders', 'program_id')) {
                    $table->unsignedBigInteger('program_id')->nullable();
                }
                if (!Schema::hasColumn('sliders', 'yt_id')) {
                    $table->string('yt_id')->nullable();
                }
                if (!Schema::hasColumn('sliders', 'align')) {
                    $table->string('align')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
