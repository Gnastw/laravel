<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendingUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spending_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('spending_id');
            $table->decimal('price', 7,2);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('spending_id')->references('id')->on('spendings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spending_user');
    }
}
