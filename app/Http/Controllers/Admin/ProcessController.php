<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    // Process Data link logic
    public function processData()
    {
        $data = "Data processed successfully!";
        
        return view('admin.process_data', compact('data'));
    }
}
