<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('partition_id'); // relation with partitions
            $table->string('trait')->nullable(); // i recomended use partition treat
            $table->string('status')->default('closed'); // closed open paied
            $table->integer('bill_id')->default(-1);
            $table->integer('charis')->default(0);
            $table->integer('table')->default(0);
            $table->string('employee_id')->nullable();  // relation with employee
            $table->boolean('done')->default(0);  // 0 or 1
            $table->float('prepaid')->default(0);
            $table->string('creator')->nullable();
            $table->integer('last_bill_id')->default(-1); // used for make prize system
            $table->string('notes', 150)->nullable();

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
        Schema::dropIfExists('sections');
    }
}
