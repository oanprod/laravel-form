<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('families', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        DB::table('families')->insert([
            'category_id' => 1,
            'name' => 'Famille 1',
            'description' => 'Description famille 1',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);

        DB::table('families')->insert([
            'category_id' => 1,
            'name' => 'Famille 2',
            'description' => 'Description famille 2',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('families')->insert([
            'category_id' => 2,
            'name' => 'Famille 3',
            'description' => 'Description famille 3',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('families')->insert([
            'category_id' => 3,
            'name' => 'Famille 4',
            'description' => 'Description famille 4',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
