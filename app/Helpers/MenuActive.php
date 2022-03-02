<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Route;

class MenuActive
{
    public static function getSetActive($uri, $active = 'active')
    {
        if(is_array($uri)){
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $active;
                }
            }
        } else {
            if(Route::is($uri)){
                return $active;
            }
        }
    }
}
