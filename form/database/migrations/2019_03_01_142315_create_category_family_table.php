<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateCategoryFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_family', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('family_id');
            $table->timestamps();
        });

        Schema::table('category_family', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('category_family', function(Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('families')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        DB::table('category_family')->insert([
            'category_id' => 1,
            'family_id' => 1,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);

        DB::table('category_family')->insert([
            'category_id' => 1,
            'family_id' => 2,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('category_family')->insert([
            'category_id' => 2,
            'family_id' => 1,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('category_family')->insert([
            'category_id' => 3,
            'family_id' => 1,
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
        Schema::table('category_family', function(Blueprint $table) {
            $table->dropForeign('category_id');
        });

        Schema::table('category_family', function(Blueprint $table) {
            $table->dropForeign('family_id');
        });


        Schema::dropIfExists('category_family');
    }
}
