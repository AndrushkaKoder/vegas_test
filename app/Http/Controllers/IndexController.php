<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Files;
use App\Models\Params;
use App\Models\Service;
use App\Models\Social;
use App\Models\Title;


class IndexController extends Controller
{

    public function index(){

//        $services = Service::query()->paginate(9);


        $service = Service::query()->with('files')->get();


        return view('index', compact('service'));
    }


    public function show($slug){

        $service = Service::query()->where('slug','=', $slug)->first()->load('files');

        return view('services.show', compact('service'));

    }




}
