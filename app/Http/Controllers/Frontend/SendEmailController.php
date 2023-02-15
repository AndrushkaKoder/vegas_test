<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

		try {
			$feedback = Feedback::makeNew('Услуга', $data, [
				'service' => 'Сервис',
			]);
		} catch (\Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}

		Mail::to('andrusha.kolmakov@yandex.ru')->send(new Mailer($feedback));

		return redirect()->route('frontend.index')->with('success', 'Мы свяжемся с Вами в течение 10 минут');
	}

}
