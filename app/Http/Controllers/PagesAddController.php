<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {

        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            ];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required'
            ], $messages);

            // если валидация не пройдена - редикрект
            if ($validator->fails()) {

                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                // копирование файла в каталог
                $file->move(public_path() . '/assets/img', $input['images']);
            }

            // заполнить таблицу pages
            $page = new Page();

            $page->fill($input);

            if ($page->save()) {

                return redirect('admin')->with('status', 'Страница добавлена');
            }
        }


        if (view()->exists('admin.pages_add')) {

            $data = [
                'title' => 'Новая страница'
            ];

            return view('admin.pages_add', $data);
        }

        abort(404);
    }
}
