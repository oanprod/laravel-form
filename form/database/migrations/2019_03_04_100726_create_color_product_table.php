<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateColorProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('color_id');
            $table->timestamps();
        });

        Schema::table('color_product', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('color_product', function(Blueprint $table) {
            $table->foreign('color_id')->references('id')->on('colors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        DB::table('color_product')->insert([
            'product_id' => 1,
            'color_id' => 1,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);

        DB::table('color_product')->insert([
            'product_id' => 1,
            'color_id' => 2,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('color_product')->insert([
            'product_id' => 2,
            'color_id' => 1,
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('color_product')->insert([
            'product_id' => 3,
            'color_id' => 1,
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
        Schema::dropIfExists('color_product');
    }
}
