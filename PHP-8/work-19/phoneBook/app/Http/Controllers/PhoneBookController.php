<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class PhoneBookController extends Controller
{

    public function action()
    {
        $params = !empty(session('message')) ? session('message') : [];
        $phones = \App\PhoneBook::getList();
        $params['phoneBook'] = $phones;
        return view('phone-book', $params);
    }

    public function addPhone(Request $request)
    {
        $phone = \App\PhoneBook::get('phone', $request->input('phone'));
        if ($phone) {
            return redirect('/')->with('message', ['err' => json_encode($phone)]);
        } else {
            \App\PhoneBook::addRow(['phone' => $request->input('phone'), 'name' => $request->input('name')]);
            return redirect()->back();
        }
    }

    public function deletePhone(Request $request)
    {
        return \App\PhoneBook::deleteRow('id', $request->input('id'));
    }

    public function updatePhone(Request $request)
    {
        return \App\PhoneBook::updateRow('id', $request->input('id'), [
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ]);
    }
}
