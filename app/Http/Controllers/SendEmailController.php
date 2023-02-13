<?php

namespace App\Http\Controllers;

use App\Mail\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{


	public function sendEmail(Request $request)
	{

		!empty($_POST) ? $mailBody = "Заказ " . $_POST['service']
			. " от пользователя "
			. $_POST['name'] . "." . " Телефон: " . $_POST['phone']
			: $mailBody = '';

		$feedbacker = Feedbacker::makeNew(request()->all(), [
			'user_name' => 'Имя',
			'user_email' => 'E-mail',
			'user_phone' => 'Телефон',
			'service' => 'Услуга',
		]);

		//Вставить свой e-mail и чекать спам
		Mail::to('andrusha.kolmakov@yandex.ru')->send(new MailController($feedbacker));

		$request->session()->flash('success', 'Мы свяжемся с Вами в течение 10 минут');

		return redirect('/');


	}

}
