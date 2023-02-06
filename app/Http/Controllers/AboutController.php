<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    public function index(){

    $aboutData = About::query()->insert([
        'name' => 'Премка228',
        'description' => 'Заебис внатуре четко',

    ]);

//    dd($aboutData);

       $a=1;

        return view('about');

    }
}
