<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Service;
use App\Models\Social;
use App\Models\Title;


class IndexController extends Controller
{

    public function index(){

//        $contacts = Contacts::query()->get();
//
//        $socials = Social::query()->get();

        $info = Title::query()->get();

        $services = Service::query()->paginate(9);

        return view('index', compact('info', 'services'));
    }


    public function show($slug){

        $service = Service::query()->where('slug','=', $slug)->first();

        return view('services.show', compact('service'));

    }




}
