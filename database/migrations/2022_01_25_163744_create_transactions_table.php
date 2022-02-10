<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("montant");
            $table->unsignedBigInteger("agent_id");
            $table->unsignedBigInteger("compagnie_id");
            $table->unsignedBigInteger("station_id");
            $table->string("code_bon")->nullable();
            $table->string("phone")->nullable();
            $table->string("payment_method");
            $table->string("status");
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
        Schema::dropIfExists('transactions');
    }
}
