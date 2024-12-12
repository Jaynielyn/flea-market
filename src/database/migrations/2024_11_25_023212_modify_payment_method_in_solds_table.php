<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPaymentMethodInSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solds', function (Blueprint $table) {
            // もし 'payment_method' カラムが存在しない場合は追加
            if (!Schema::hasColumn('solds', 'payment_method')) {
                $table->string('payment_method')->default('クレジットカード');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solds', function (Blueprint $table) {
            // 'payment_method' カラムを削除
            $table->dropColumn('payment_method');
        });
    }
}