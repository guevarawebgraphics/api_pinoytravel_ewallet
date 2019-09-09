<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopUpHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_up_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userId');
            $table->string('txnid');
            $table->string('dpRefNo')->nullable();
            $table->string('status')->nullable();
            $table->string('dpProcID')->nullable();
            $table->string('refCode');
            $table->string('email');
            $table->string('procId');
            $table->decimal('amount', 13, 2);
            $table->integer('is_paid');
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
        Schema::dropIfExists('top_up_history');
    }
}
