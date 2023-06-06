<?php

namespace App\Http\Controllers;

use App\Models\ListModel;
use App\Models\PanoModel;
use App\Models\TaskModel;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanoController extends Controller
{

    public function index(){

        $selectedPano = Request::capture()->input("pano");

        if(count(Auth::user()->getPano) == 0){
            //TODO: HİÇ PANONUZ YOK UYARISI VE PANO OLUSTUR KISMINA GIDILECEK
            dd("HIC PANONUZ YOK");
        }

        if ($selectedPano){
            $usersPano = Auth::user()->getPano->find($selectedPano);
        }else{
            $usersPano = Auth::user()->getPano->first();
        }

        if (!$usersPano){
            //TODO: PANO BULUNAMADI HATASI
            dd("PANO BULUNAMADI VEYA YETKINIZ YOK");
        }

        $lists = $usersPano->getList;
        $tasks = [];

        foreach ($lists as $list){
            array_push($tasks, $list->getTasks);
        }


        $folder = array(
            "viewFolder"    => "front",
            "subViewFolder" => "home",
            "transaction"   => "",
        );
        return view("front.index")->with(compact("folder", "lists", "tasks", "usersPano"));

    }

    public function createTask(Request $request){

        $newTask = new TaskModel();
        $newTask->list_id = $request->listId;
        $newTask->title   = $request->title;
        $newTask->content = $request->description;
        $newTask->created_by = Auth::user()->id;
        $newTask->save();

        $returnData = $request->all();
        $returnData["created_at"] = time();
        $returnData["created_by"] = Auth::user()->fullname;
        $returnData["taskId"]     = $newTask->id;
        $returnData["listId"]     = $newTask->parentList->id;
        return response()->json($returnData);
    }

    public function deleteTask(Request $request){
        $task = TaskModel::find($request->taskId);
        $task->delete();

        $returnData = $request->all();

        return response()->json($returnData);
    }

    public function updateTask(Request $request){
        $task = TaskModel::find($request->taskId);
        $task->title   = $request->title;
        $task->content = $request->description;
        $task->save();

        $returnData = $request->all();
        $returnData["created_at"] = date('d/m/Y');
        $returnData["taskId"] = $task->id;

        return response()->json($returnData);

    }

    public function deleteAllTask(Request $request){
        $tasks = ListModel::find($request->listId)->getTasks;
        $returnData=[];
        foreach ($tasks as $task){
            $task->delete();
            array_push($returnData, $task->id);
        }
        return response()->json($returnData);
    }

    public function createList(Request $request){

        $newList = new ListModel();
        $newList->pano_id    = $request->panoId;
        $newList->name       = $request->title;
        $newList->save();

        $returnData = $request->all();
        $returnData["id"] = $newList->id;
        return response()->json($returnData);
    }

    public function deleteList(Request $request){
        $deleteList = ListModel::find($request->listId);
        $deleteList->delete();

        $returnData["id"] = $deleteList->id;
        return response()->json($returnData);
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
    public function updateList(Request $request){
        $list = ListModel::find($request->id);
        $list->name   = $request->title;

        $list->save();

        $returnData = $request->all();

        return response()->json($returnData);

    }




}
