<?php

use Intervention\Image\ImageManagerStatic as img;


function imageClipping($request_file){
    $file = $request_file;
    $size = getimagesize($file);
    $oran = array_values($size)[0] / 768;
    $img = img::make($file)->resize(768, (int)(array_values($size)[1] / $oran));
    return $img;
}

function uploadImage($picture, $path, $url){

    $image = imageClipping($picture);
    $img_name = $url . date("_d.m.y_h-i-s") .".". $picture->extension();
    $image->save(public_path() . $path .   "/" .$img_name, 80);
    return $img_name;
}

function uploadFile($file, $path, $name){
    $file_name = $name . date("_d.m.y_h-i-s") .".". $file->extension();
    $file->move(public_path() . "/" . $path . "/" , $file_name);
    return $file_name;
}



?>
