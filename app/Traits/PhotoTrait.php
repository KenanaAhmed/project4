<?php
namespace App\Traits;

use Image;


Trait PhotoTrait{

     function savePhoto($photo,$folder)
    {
        //extension of photo
        $file_extension=$photo->getClientOriginalExtension();
        //name of photo
        $file_name=time().'.'.$file_extension;
      //  $file_name->resize(50,80);
        $photo->move($folder,$file_name);
        return $file_name;

    }
}
