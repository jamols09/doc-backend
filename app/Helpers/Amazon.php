<?php

namespace App\Helpers;

class Amazon
{
    /**
     * Upload file to Amazon
     *
     * @param  object $data
     * @param  string $name
     * @return void
     */
    
    public static function upload($data, $name)
    {
        $path = $data->file($name)->store($name, 's3');
        return \Storage::disk('s3')->url($path);
    }
}