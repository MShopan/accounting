<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // do add permition with positive quant and diss permission tith negative quant
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id'); // relation with product
            $table->float('quant');
            $table->float('purchase_price')->default(0);
            $table->integer('creator');  // relation with the user
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
