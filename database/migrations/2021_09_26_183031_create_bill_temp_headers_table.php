<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTempHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_temp_headers', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id')->default(0); // relation with bills
            $table->integer('customer_id')->default(0); // relation with cusomder
            $table->integer('employee_id')->default(0); // relation with elmployee
            $table->integer('chairs')->default(0);
            $table->integer('tables')->default(0);
            $table->float('prepaid')->default(0);
            $table->float('discount')->default(0);
            $table->integer('creator')->default(0);  // relation with user
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
        Schema::dropIfExists('bill_temp_headers');
    }
}
