<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DonationsImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importDonations(){
        Excel::import(new DonationsImport, request()->file('your_file'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
