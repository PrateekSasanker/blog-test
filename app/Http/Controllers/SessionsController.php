<?php

namespace App\Http\Controllers;

use App\User;

class SessionsController extends Controller
{

    public function __contruct()
    {

        $this->middleware('guest', ['except' => 'destroy']);

    }

    public function create()
    {

        return view('sessions.create');

    }

    public function store()
    {

          //authenticate user

          if(!auth()->attempt(request(['email', 'password'])))
          {

              return back()->withErrors([

                  'message' => 'Please check your credentials and try again!'

              ]);

          }


          return redirect()->home();

    }


    public function destroy()
    {

        auth()->logout();

        return redirect()->home();

    }


}
