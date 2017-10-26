<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 09/01/2017
 * Time: 13:32
 */

namespace app\Facades;


use Illuminate\Support\Facades\Facade;

class AssetsFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'Assets';
    }
}