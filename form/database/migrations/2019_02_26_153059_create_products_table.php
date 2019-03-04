<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('family_id');
            $table->string('name');
            $table->double('price')->unsigned();
            $table->string('picture')->nullable();
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('families')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        DB::table('products')->insert([
            'family_id' => 1,
            'name' => 'Predator',
            'price' => '129',
            'picture' => 'uploads/predator.jpg',
            'description' => 'Predator Size 8 M',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('products')->insert([
            'family_id' => 1,
            'name' => 'Stan Smith',
            'price' => '89',
            'picture' => 'uploads/predator.jpg',
            'description' => 'Stan Smith Size 6 W',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('products')->insert([
            'family_id' => 2,
            'name' => 'Green Shirt',
            'price' => '29',
            'picture' => 'uploads/shirt.jpg',
            'description' => 'Green Shirt Size S',
            'created_at'  => Carbon::today(),
            'updated_at'  => Carbon::today()
        ]);
        DB::table('products')->insert([
            'family_id' => 3,
            'name' => 'Red Pant',
            'price' => '49',
            'picture' => 'uploads/pant.jpg',
            'description' => 'Red Pant Size 38 M',
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
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('color_id');
        });

        Schema::dropIfExists('products');
    }
}
