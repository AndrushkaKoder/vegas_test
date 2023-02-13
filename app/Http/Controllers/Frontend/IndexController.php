<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;


class IndexController extends Controller
{

    public function index(){

        $service = Service::query()->with('files')->get();


        return view('frontend.index', compact('service'));
    }


    public function show($slug){

        $service = Service::query()->where('slug','=', $slug)->first()->load('files');

        return view('frontend.services.show', compact('service'));

    }


}

