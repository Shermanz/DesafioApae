<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\Auth;
use App\Donation;

class DonationController extends VoyagerBaseController
{
    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $donation = Donation::where('id',$id)->first();

        $donation->value = $request->value;
        $donation->document = $request->document;
        $donation->name = $request->name;
        $donation->contact = $request->contact;

        $donation->save();
        return redirect()->route('voyager.donations.index');
    }

    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    // POST BRE(A)D - Store data.

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $donation = new Donation;

        $donation->user_id = $user_id;
        $donation->value = $request->value;
        $donation->document = $request->document;
        $donation->name = $request->name;
        $donation->contact = $request->contact;

        $donation->save();
        return redirect()->route('voyager.donations.index');
    }
}
