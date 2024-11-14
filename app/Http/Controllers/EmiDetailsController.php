<?php
// app/Http/Controllers/EmiDetailsController.php
namespace App\Http\Controllers;

use App\Services\EmiDetailsService;
use Illuminate\Support\Facades\DB;

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
        //return redirect()->route('admin.emiData')->with('success', 'EMI Details Processed Successfully');

        return redirect()->route('emiDetails.index')->with('success', 'EMI Details Processed Successfully');
    }
    public function index()
    {
        // Fetch data from emi_details table
        $emiDetails = DB::table('emi_details')->get();

        // Pass data to the view
        return view('emi_details.index', compact('emiDetails'));
    }
}
