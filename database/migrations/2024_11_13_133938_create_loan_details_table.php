<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('clientid'); // Foreign key reference for client
            $table->integer('num_of_payment'); // Total number of payments (EMI count)
            $table->date('first_payment_date'); // Start date of payments
            $table->date('last_payment_date'); // End date of payments
            $table->decimal('loan_amount', 15, 2); // Total loan amount (with 2 decimal points)
            $table->timestamps(); // Created_at and updated_at fields

            // Optional: Add a foreign key constraint if `clients` table exists
            // $table->foreign('clientid')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_details');
    }
}
