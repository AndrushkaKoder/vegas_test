<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{

    public function index()
    {

        $aboutData = About::query()->insert([
            'name' => 'Премка228',
            'description' => 'Заебис внатуре четко',

        ]);

        return view('frontend.about');

    }
}
