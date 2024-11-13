<?php

// app/Repositories/EmiDetailsRepository.php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmiDetailsRepository
{
    /**
     * Get the min and max payment dates from the loan_details table.
     *
     * @return object
     */
    public function getMinMaxPaymentDates()
    {
        return DB::table('loan_details')
            ->selectRaw('MIN(first_payment_date) as min_date, MAX(last_payment_date) as max_date')
            ->first();
    }

    /**
     * Create the emi_details table dynamically based on the min and max dates.
     *
     * @param string $minDate
     * @param string $maxDate
     */
    public function createEmiDetailsTable($minDate, $maxDate)
    {
        // Extract the months between minDate and maxDate
        $startDate = Carbon::parse($minDate);
        $endDate = Carbon::parse($maxDate);

        // Generate dynamic column names (e.g., 2019_Feb, 2019_Mar, ...)
        $columns = [];
        while ($startDate <= $endDate) {
            $columns[] = $startDate->format('Y_M');
            $startDate->addMonth();
        }

        // If the emi_details table exists, drop it
        DB::statement('DROP TABLE IF EXISTS emi_details');

        // Create the emi_details table with dynamic columns
        $createTableQuery = 'CREATE TABLE emi_details (
            clientid INT NOT NULL';

        foreach ($columns as $column) {
            $createTableQuery .= ", `$column` DECIMAL(10,2) DEFAULT 0.00";
        }

        $createTableQuery .= ')';

        DB::statement($createTableQuery);
    }

    /**
     * Insert EMI data into the emi_details table.
     *
     * @param object $loanDetails
     * @param string $minDate
     * @param string $maxDate
     */
    public function insertEmiDetailsData($loanDetails, $minDate, $maxDate)
    {
        // Extract the months between minDate and maxDate
        $startDate = Carbon::parse($minDate);
        $endDate = Carbon::parse($maxDate);

        // Generate dynamic column names (e.g., 2019_Feb, 2019_Mar, ...)
        $columns = [];
        while ($startDate <= $endDate) {
            $columns[] = $startDate->format('Y_M');
            $startDate->addMonth();
        }

        foreach ($loanDetails as $loan) {
            $emiAmount = $loan->loan_amount / $loan->num_of_payment;
            $row = ['clientid' => $loan->clientid];

            $startDate = Carbon::parse($loan->first_payment_date);
            $endDate = Carbon::parse($loan->last_payment_date);

            // Add the EMI values to the respective columns
            while ($startDate <= $endDate) {
                $column = $startDate->format('Y_M');
                if (in_array($column, $columns)) {
                    $row[$column] = $emiAmount;
                }
                $startDate->addMonth();
            }

            // Insert the data into emi_details table
            DB::table('emi_details')->insert($row);
        }
    }
}
