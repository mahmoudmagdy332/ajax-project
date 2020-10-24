<?php
use Illuminate\Http\UploadedFile;
function saveImage($photo,$folder){
    $fileExtintion=$photo->clientExtension();
    $fileName=time().'.'.$fileExtintion;
    $path=$folder;
    $photo->move($path,$fileName);
    return $fileName;
}
