<?php

namespace App\Http\Controllers;

use App\Mail\MailController;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\Exception;

class SendEmailController extends Controller
{


    public function sendEmail(Request $request){

        if($request->method() === 'POST'){

            !empty($_POST) ? $mailBody = "Заказ " .$_POST['service']
                . " от пользователя "
                . $_POST['name'] . "." . " Телефон: " . $_POST['phone']
                : $mailBody = '';

            //Вставить свой e-mail и чекать спам
            Mail::to('ivany4h@yandex.ru')->send(new MailController($mailBody));

            $request->session()->flash('success', 'Мы свяжемся с Вами в течение 10 минут');

            return redirect('/');

        } else {

            throw new \Exception('ошибка отправки', 500);

        }


    }

}
