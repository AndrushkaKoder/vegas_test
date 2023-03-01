<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

	public function mailTo($object)
	{
		Mail::to('andrusha.kolmakov@yandex.ru')->send(new Mailer($object));
	}


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

		$this->mailTo($feedback);

		return redirect()->route('frontend.index')->with('success', 'Мы свяжемся с Вами в течение 10 минут');
	}

	public function sendEmailAbout(): \Illuminate\Http\RedirectResponse
	{
		$data = request()->all();

		try {
			$feedback = Feedback::makeNew('Обратная связь', $data, [
				'user_feedback' => 'Обратная связь'
			]);

		} catch (\Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}

		$this->mailTo($feedback);

		if(!empty(request()->file('file'))){
			$feedback->saveFile('file', request()->file('file'));
		}

		$message = request()->file() ? 'Спасибо за отзыв. Мы просмотрим Ваше вложение' : 'Спасибо за ваш отзыв';

		return redirect()->route('frontend.about')->with('success', $message);
	}

}
