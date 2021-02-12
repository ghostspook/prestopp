<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('provider_id')->constrained();
            $table->string('address');
            $table->decimal('client_charge');
            $table->decimal('prestopp_margin');
            $table->decimal('provider_vat');
            $table->smallInteger('state')->comment('1: pending, 2: completed, 3: cancelled');
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
        Schema::dropIfExists('tasks');
    }
}
