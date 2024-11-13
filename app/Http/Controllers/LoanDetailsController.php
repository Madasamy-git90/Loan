<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanDetail; // Your LoanDetail model

class LoanDetailsController extends Controller
{
    
    public function index()
    {
        $loanDetails = LoanDetail::all(); // Fetch loan details
        return view('loan_details.index', compact('loanDetails')); // Return the view
    }
}

