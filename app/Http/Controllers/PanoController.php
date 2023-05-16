<?php

namespace App\Http\Controllers;

use App\Models\PanoModel;
use App\Models\User;
use Illuminate\Http\Request;

class PanoController extends Controller
{
    public function addPanoAndUserEXAMPLE(){

        // PANO VE BU PANOYA BIRDEN FAZLA USER EKLEME ORNEGI

        $asd = new PanoModel();
        $asd->title = "TEST PANO 2";
        $asd->slug  = "YINE TEST 2";
        $asd->save();
        $total_category = [];

        foreach (User::all() as $users) {

            $total_category[] = $users->id;
        }

        $asd->UserAccess()->attach($total_category);
    }
}
