<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investment;
use App\Donation;
use DB;
use Illuminate\Support\Facades\URL;

class ApiController extends Controller
{
    public function transaction(Request $request)
    {
        $donation = Donation::get();
        $investment = Investment::get();
        return response()->json([
            'donation'=>$donation,
            'investment'=>$investment,
        ], 201);
    }

    public function dateTransaction($dateMin)
    {
        // Y-M-D
        $donation = Donation::whereDate('created_at', '>=', $request->dateMin)
                            ->whereDate('created_at', '<=', $request->dateMax)
                            ->get();
        $investment = Investment::whereDate('created_at', '>=', $request->dateMin)
                                ->whereDate('created_at', '<=', $request->dateMax)
                                ->get();
        return response()->json([
            'donation'=>$donation,
            'investment'=>$investment,
        ], 201);
    }

    public function userTransaction(Request $request)
    {
        $donation = Donation::where('document', $request->document)->get();
        $investment = Investment::get();
        return response()->json([
            'donation'=>$donation,
            'investment'=>$investment,
        ], 201);
    }
}
