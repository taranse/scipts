<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class PhoneBookController extends Controller
{

    public function action()
    {
        $params = !empty(session('message')) ? session('message') : [];
        $phones = DB::table("phone_book")->get();
        $params['phoneBook'] = $phones;
        return view('phone-book', $params);

    }

    public function addPhone(Request $request)
    {
        $phone = DB::table('phone_book')->where('phone', $request->input('phone'))->first();
        if ($phone) {
            return redirect('/')->with('message', ['err' => 'Такой телефон уже существует']);
        } else {
            DB::table("phone_book")->insert(['phone' => $request->input('phone'), 'name' => $request->input('name')]);
            return redirect()->back();
        }
    }

    public function deletePhone(Request $request)
    {
        return DB::table('phone_book')->where('id', $request->input('id'))->delete();
    }
}
