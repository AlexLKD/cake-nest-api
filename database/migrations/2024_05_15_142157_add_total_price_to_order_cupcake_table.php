<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceToOrderCupcakeTable extends Migration
{
    public function up()
    {
        Schema::table('order_cupcake', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->after('quantity')->nullable();
        });
    }

    public function down()
    {
        Schema::table('order_cupcake', function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
}

