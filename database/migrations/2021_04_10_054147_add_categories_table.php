<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class AddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        $groups = [
            'Board Game',
            'Card Game',
            'Escape Room',
            'Drawing Game',
            'Word Game',
            'Party Game',
            'Puzzle',
            'Web Game',
        ];

        foreach ($groups as $group) {
            // $role = new Role();
            // $role->slug = $slug;
            // $role->name = $name;
            // $role->save();

            Category::create([ 'name' => $group]); //this is the same!
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
