<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Menu;

class FeedbackController extends Controller
{
    public function show()
    {
        $data = [
            'pageTitle' => 'Обратная связь', 
            'activePage' => 'Обратная связь',
            'menu' => (new Menu())->get(),
        ];

        return view('feedback', $data);
    }

    public function createFeedback(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $msg = $request->message;

        if ((new Feedback())->create($name, $email, $msg)) {
            return back()->with("feedbackMsg", "Ваше сообщение отправлено!!!");
        } else {
            return back()->with("feedbackMsg", "Заполните поля в соответствии с подсказками к ним!!!")->withInput();
        }
    }
}
