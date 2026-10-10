<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'tagline')) {
                $table->string('tagline')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('programs', 'akreditasi')) {
                $table->string('akreditasi')->nullable()->after('tagline');
            }
            if (!Schema::hasColumn('programs', 'title1')) {
                $table->string('title1')->nullable();
            }
            if (!Schema::hasColumn('programs', 'title2')) {
                $table->string('title2')->nullable();
            }
            if (!Schema::hasColumn('programs', 'title3')) {
                $table->string('title3')->nullable();
            }
            if (!Schema::hasColumn('programs', 'title4')) {
                $table->string('title4')->nullable();
            }
            if (!Schema::hasColumn('programs', 'description1')) {
                $table->longText('description1')->nullable();
            }
            if (!Schema::hasColumn('programs', 'description2')) {
                $table->longText('description2')->nullable();
            }
            if (!Schema::hasColumn('programs', 'description3')) {
                $table->longText('description3')->nullable();
            }
            if (!Schema::hasColumn('programs', 'description4')) {
                $table->longText('description4')->nullable();
            }
            if (!Schema::hasColumn('programs', 'image2')) {
                $table->string('image2')->nullable();
            }
            if (!Schema::hasColumn('programs', 'image3')) {
                $table->string('image3')->nullable();
            }
            if (!Schema::hasColumn('programs', 'image4')) {
                $table->string('image4')->nullable();
            }
            if (!Schema::hasColumn('programs', 'image5')) {
                $table->string('image5')->nullable();
            }
            if (!Schema::hasColumn('programs', 'image_head')) {
                $table->string('image_head')->nullable();
            }
            if (!Schema::hasColumn('programs', 'yt_id')) {
                $table->string('yt_id')->nullable();
            }
            if (!Schema::hasColumn('programs', 'id_yt')) {
                $table->string('id_yt')->nullable();
            }
            if (!Schema::hasColumn('programs', 'statistik1')) {
                $table->string('statistik1')->nullable();
            }
            if (!Schema::hasColumn('programs', 'statistik2')) {
                $table->string('statistik2')->nullable();
            }
            if (!Schema::hasColumn('programs', 'statistik3')) {
                $table->string('statistik3')->nullable();
            }
            if (!Schema::hasColumn('programs', 'statistik4')) {
                $table->string('statistik4')->nullable();
            }
        });
    }

    public function down()
    {
        //
    }
};
