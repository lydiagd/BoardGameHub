<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tag_review', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::table('favorites', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            // $table->dropSoftDeletes();
        });
    }
}
