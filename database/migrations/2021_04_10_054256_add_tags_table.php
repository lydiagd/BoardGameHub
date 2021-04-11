<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        $groups = [
            'multiplayer',
            'fun',
            'boring',
            'difficult',
            'fast',
            'long',
            'exciting',
            'solo',
        ];

        foreach ($groups as $group) {
            // $role = new Role();
            // $role->slug = $slug;
            // $role->name = $name;
            // $role->save();

            Tag::create([ 'name' => $group]); //this is the same!
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
