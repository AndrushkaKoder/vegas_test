<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{


	public function sendEmail(): \Illuminate\Http\RedirectResponse
	{
		$data = request()->all();
		$data['service'] = Service::findOrFail($data['service'])->title;

		$feedback = Feedback::makeNew('Услуга', $data, [
			'service' => 'Сервис',
		]);


		Mail::to('andrusha.kolmakov@yandex.ru')->send(new Mailer($feedback));

		return redirect()->route('frontend.index')->with('success', 'Мы свяжемся с Вами в течение 10 минут');
	}

}
