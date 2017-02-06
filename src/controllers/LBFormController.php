<?php

namespace LIBRESSLtd\LBForm\Controller;

use Illuminate\Http\Request;
use Cookie;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
   
    public function getSetLang($lang)
    {
        return redirect()->back()->withCookie(Cookie::make("locale", $lang));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url("/"));
    }
}
