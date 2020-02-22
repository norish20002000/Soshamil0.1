<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sns_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sns_id');
            $table->string('sns_etc_name')->nullable();
            $table->string('account_name');
            $table->string('url');
            $table->string('comment')->nullable();
            $table->bigInteger('user_id');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('sns_accounts');
    }
}
