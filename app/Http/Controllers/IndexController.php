<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        // отправка сообщений email
        if ($request->isMethod('post')) {

            // сообщение для ошибок валидации
            $messages = [
                'required' => 'Поле обязательно к заполнению',
                'email' => 'Поле :attribute должно соответствовать email адресу',
            ];

            // правила валидации
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required',
            ], $messages);

            $data = $request->all();

            // Доступ к библиотеке Mail
            $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                // отправитель письма
                $message->from($data['email'], $data['name']);

                // получатель письма
                $message->to($mail_admin);

                // тема
                $message->subject('Question');
            });

            if ($result) {
                return redirect()->route('home')->with('status', 'Email успешно отправлен');
            }
        }

        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        // фильтры для Portfolio
        $tags = DB::table('portfolios')->distinct()->lists('filter');

        // меню для header
        $menu = [];

        foreach ($pages as $page) {

            $item = ['title' => $page->name, 'alias' => $page->alias];
            array_push($menu, $item);
        }

        // 'alias' => id (из view "content" -> <section id="service">)
        $item = ['title' => 'Services', 'alias' => 'service'];
        array_push($menu, $item);

        $item = ['title' => 'Portfolio', 'alias' => 'Portfolio'];
        array_push($menu, $item);

        $item = ['title' => 'Team', 'alias' => 'team'];
        array_push($menu, $item);

        $item = ['title' => 'Contact', 'alias' => 'contact'];
        array_push($menu, $item);

        return view('site.index', array(
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags
        ));
    }
}
