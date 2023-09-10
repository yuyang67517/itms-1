<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('cash_sales', 10, 2)->default(0);
            $table->decimal('credit_card_sales', 10, 2)->default(0);
            $table->decimal('ewallet_sales', 10, 2)->default(0);
            $table->decimal('total_sales', 10, 2)->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
       
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
