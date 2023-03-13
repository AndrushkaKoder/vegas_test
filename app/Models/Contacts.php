<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

//    static function getValue($names)
//    {
//        static $items = null;
//        if (is_null($items))
//            $items = self:: all()->keyBy('name')->pluck('value', 'name');
//
//        $result = [];
//        foreach ((array) $names as $name) {
//            if (isset($items[$name]))
//                $result[$name] = $items[$name];
//        }
//
//        if (count($result) == 1)
//            return current($result);
//
//        return $result;
//    }
}
