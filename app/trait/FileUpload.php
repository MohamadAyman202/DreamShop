<?php

namespace App\Trait;

use Illuminate\Support\Facades\File;

trait FileUpload
{
    static public function File($type, $file)
    {
        $extention = strtolower($file->getClientOriginalExtension());
        $name = time() . rand(100, 999) . '.'  . $extention;
        $file->move($type, $name);
        return $type . $name;
    }

    static public function Delete($file)
    {
        if (file_exists($file)) {
            return File::delete($file);
        }
    }
}
