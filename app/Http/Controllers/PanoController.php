<?php

namespace App\Http\Controllers;

use App\Models\ListModel;
use App\Models\PanoModel;
use App\Models\TaskModel;
use App\Models\User;
use Illuminate\Http\Request;

class PanoController extends Controller
{

    public function indexExample(){

        $folder = array(
            "viewFolder"    => "front",
            "subViewFolder" => "home",
            "transaction"   => "",
        );
        return view("front.index")->with(compact("folder"));

    }

    public function addPanoAndUserEXAMPLE(){

        // PANO VE BU PANOYA BIRDEN FAZLA USER EKLEME ORNEGI

        $asd = new PanoModel();
        $asd->title = "TEST PANO 2";
        $asd->slug  = "YINE TEST 2";
        $asd->save();
        $totaluser = [];

        foreach (User::all() as $users) {

            $totaluser[] = $users->id;
        }

        $asd->UserAccess()->attach($totaluser);
    }

    public function addListExample(){

        //LIST OLUŞTURMA ORNEGI

        $pano = PanoModel::find(4);
        $list = new ListModel();
        $list->name = "LIST TEST";
        $list->slug = "asd";

        $pano->parentPano()->save($list);

    }

    public function addTaskExample(){

        $list = ListModel::find(2);
        $task = new TaskModel();
        $task->title = "NEW TASKK TEST";
        $task->content = "TESTASD";
        $task->slug  = "ASD";

        $list->parentList()->save($task);

        dd("ok");


    }


}
