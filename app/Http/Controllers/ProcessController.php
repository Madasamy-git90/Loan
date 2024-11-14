<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\EmiDetailsService;
use Illuminate\Support\Facades\Schema;


class ProcessController extends Controller
{
    protected $emiDetailsService;

    public function __construct(EmiDetailsService $emiDetailsService)
    {
        $this->emiDetailsService = $emiDetailsService;
    }
    // Process Data link logic
    public function processData(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Process EMI details
            $this->emiDetailsService->processEmiDetails();
            return redirect()->route('processData')->with('success', 'EMI details processed successfully.');
        }
        // Fetch data from emi_details table
        if (Schema::hasTable('emi_details')) {
            // Fetch data from emi_details table if it exists
            $emiDetails = DB::table('emi_details')->get();
        } else {
            // If the table doesn't exist, set $emiDetails to an empty collection
            $emiDetails = collect();
        }

        
        return view('admin.process_data', compact('emiDetails'));
    }
}
