<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMenu;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'My Profile';
        return view('/pages/profile')->with(['title' => $title]);
    }

    public function profile()
    {
        $title = 'My Profile';
        return view('/pages/profile')->with(['title' => $title]);
    }

    public function menu()
    {
        return view('pages/menu');
    }

    public function about()
    {
        return view('pages/about');
    }
}
