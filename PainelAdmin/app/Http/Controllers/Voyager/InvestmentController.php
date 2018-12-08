<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Facades\Auth;
use App\Investment;

class InvestmentController extends VoyagerBaseController
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
        $investment = Investment::where('id',$id)->first();

        $investment->value = $request->value;
        $investment->title = $request->title;
        $investment->description = $request->description;
        $investment->image = $request->image;
        $investment->benefited_people = $request->benefited_people;
        $investment->link_video = $request->link_video;
        $investment->link_general = $request->link_general;

        $investment->save();
        return redirect()->route('voyager.investments.index');
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

        $investment = new Investment;

        $investment->user_id = $user_id;
        $investment->value = $request->value;
        $investment->title = $request->title;
        $investment->description = $request->description;
        $investment->image = $request->image;
        $investment->benefited_people = $request->benefited_people;
        $investment->link_video = $request->link_video;
        $investment->link_general = $request->link_general;

        $investment->save();
        return redirect()->route('voyager.investments.index');
    }
}
