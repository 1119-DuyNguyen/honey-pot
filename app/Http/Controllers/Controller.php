<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        if (empty(session('encrypt'))) {
            session(['encrypt' => rand(10, 10000) . uniqid()]);
        }
        $str = session('encrypt');
        return view('welcome', compact('str'));
    }
    public function store(Request $request)
    {
        $str = session('encrypt');

        $request->validate(
            [
                'firstname' . $str =>'required',
                'lastname' . $str=>'required',
            ]
        );
        $honey=$request->input('honey'.$str);
        if(!$request->has('honey').$str||$honey !='') {
            abort('403');
        }
        Session::flash('status', 'human');

        return view('welcome', compact('str'));
    }
}
