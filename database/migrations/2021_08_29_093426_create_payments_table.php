<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_channel', 100);
            $table->string('payee_id', 100);
            $table->string('merchant_code', 100)->nullable();
            $table->float('amount', 8, 2);
            $table->float('tax_amount', 8, 2)->default(0.00);
            $table->float('total_amount', 8, 2);
            $table->string('reference_code', 100);
            $table->uuid('payment_id');
            $table->tinyInteger('status')->default(-1);
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
        Schema::dropIfExists('payments');
    }
}
