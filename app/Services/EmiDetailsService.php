<?php
// app/Services/EmiDetailsService.php
namespace App\Services;

use App\Repositories\EmiDetailsRepository;
use App\Models\LoanDetail;

class EmiDetailsService
{
    protected $emiDetailsRepository;

    public function __construct(EmiDetailsRepository $emiDetailsRepository)
    {
        $this->emiDetailsRepository = $emiDetailsRepository;
    }

    /**
     * Process EMI details
     *
     * @return void
     */
    public function processEmiDetails()
    {
        // Get the min and max payment dates from loan_details
        $dates = $this->emiDetailsRepository->getMinMaxPaymentDates();
        $minDate = $dates->min_date;
        $maxDate = $dates->max_date;

        // Create emi_details table dynamically
        $this->emiDetailsRepository->createEmiDetailsTable($minDate, $maxDate);

        // Fetch loan details
        $loanDetails = LoanDetail::all();

        // Insert EMI details data into the emi_details table
        $this->emiDetailsRepository->insertEmiDetailsData($loanDetails, $minDate, $maxDate);
    }
}
