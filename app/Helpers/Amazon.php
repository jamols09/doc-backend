<?php

namespace App\Helpers;

class Amazon
{
    public static function getPathUrl(string $path)
    {
        return \Storage::disk('s3')->url($path);
    }

    public static function saveAvatar($data)
    {
        return $data->file('avatar')->store('avatar', 's3');
    }
}