<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTempFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_temp_footers', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id');    // relation with bills
            $table->integer('product_id');   // relation with the product
            $table->float('quant')->nullable();
            $table->float('price')->nullable();
            $table->float('total')->nullable();
            $table->integer('creator')->nullable();
            $table->string('tree')->nullable();
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
        Schema::dropIfExists('bill_temp_footers');
    }
}
