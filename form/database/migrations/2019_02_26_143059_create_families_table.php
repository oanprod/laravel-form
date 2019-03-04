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
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('families')->insert([
            'name' => 'Famille 1',
            'description' => 'Description famille 1',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);

        DB::table('families')->insert([
            'name' => 'Famille 2',
            'description' => 'Description famille 2',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('families')->insert([
            'name' => 'Famille 3',
            'description' => 'Description famille 3',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('families')->insert([
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
        Schema::table('families', function(Blueprint $table) {
            $table->dropForeign('category_id');
        });

        Schema::table('families', function(Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('products');
    }
}
