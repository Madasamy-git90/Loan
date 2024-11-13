<?php
// app/Http/Controllers/EmiDetailsController.php
namespace App\Http\Controllers;

use App\Services\EmiDetailsService;

class EmiDetailsController extends Controller
{
    protected $emiDetailsService;

    public function __construct(EmiDetailsService $emiDetailsService)
    {
        $this->emiDetailsService = $emiDetailsService;
    }

    /**
     * Process EMI data and create the emi_details table
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processData()
    {
        // Process the EMI details
        $this->emiDetailsService->processEmiDetails();

        // Redirect with a success message
        return redirect()->route('admin.emiData')->with('success', 'EMI Details Processed Successfully');
    }
}
