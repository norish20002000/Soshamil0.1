<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountImagePathToSnsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sns_accounts', function (Blueprint $table) {
            $table->string("image_path")->after("status")->nullable()->comment("画像パス");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sns_accounts', function (Blueprint $table) {
            $table->dropColumn("image_path");
        });
    }
}
