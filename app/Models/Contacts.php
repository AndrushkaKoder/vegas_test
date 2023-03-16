<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contacts
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @mixin \Eloquent
 */
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
