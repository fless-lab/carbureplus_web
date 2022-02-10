<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("station_id")->nullable();
            $table->unsignedBigInteger("compagnie_id")->nullable();
            $table->string("nom");
            $table->string("prenom");
            $table->string("phone")->unique();
            $table->string("password");
            $table->string("photo_profile")->nullable();
            $table->mediumText("mime");
            $table->timestamps();

            $table->foreign("station_id")
                ->references("id")
                ->on("stations")
                ->onDelete("cascade");

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
        Schema::dropIfExists('users');
    }
}
