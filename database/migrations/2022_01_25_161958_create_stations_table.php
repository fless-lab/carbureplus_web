<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("compagnie_id");
            $table->string("nom");
            $table->string("siege");
            $table->string("email");
            $table->string("phone");
            $table->string("phone_vente");
            $table->string("password");
            $table->mediumText("mime");
            $table->timestamps();

            $table->foreign("compagnie_id")
                ->references("id")
                ->on("compagnies")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
