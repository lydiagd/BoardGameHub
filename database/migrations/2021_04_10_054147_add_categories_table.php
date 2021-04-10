<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        // $roles = [
        //     'user' => 'User',
        //     'admin' => 'Admin',
        // ];

        // foreach ($roles as $slug => $name) {
        //     // $role = new Role();
        //     // $role->slug = $slug;
        //     // $role->name = $name;
        //     // $role->save();

        //     Role::create([ 'slug' => $slug, 'name' => $name ]); //this is the same!
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
