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

    public function getUsersPano(){
        // KULLANICININ SAHİP OLDUĞU PANOLARI GETİR

        $user = User::find(2);
        $panolar = $user->getPano;
        foreach ($panolar as $pano){
            echo($pano->title);
        }
    }

    public function getListParent(){
        // LIST IN BAĞLI OLDUĞU PANOYU GETİRME

        $list = ListModel::find(1);
        $parentPano = $list->parentPano;
        dd($parentPano);
    }

    public function getTaskParent(){
        //TASKIN BAĞLI OLDUĞU PANOYU GETİRME

        $task = TaskModel::find(1);
        $parentTask = $task->parentList;
        dd($parentTask);
    }

    public function getTasksPano(){
        //TASKIN BAĞLI OLDUĞU LİSTİN BAĞLI OLDUĞU PANOYU GETİRME

        $task = TaskModel::find(1);
        $parentPano = $task->parentList->parentPano;

        dd($parentPano);

    }


}
