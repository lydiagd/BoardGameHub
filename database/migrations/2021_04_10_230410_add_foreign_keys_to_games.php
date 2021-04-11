<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('review_id')->nullable()->constrained('reviews')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
            $table->dropForeign('games_review_id_foreign');
            $table->dropColumn('review_id');
            // $table->dropColumn('category_id');
            // Schema::dropColumns('games', ['category_id']);
        });
    }
}
