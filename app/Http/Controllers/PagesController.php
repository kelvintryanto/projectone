<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'My Profile';
        return view('pages.profile')->with(['title' => $title]);
    }

    public function editprofile()
    {
        $title = 'Edit Profile';
        return view('user.edit')->with(['title' => $title]);
    }

    public function menu()
    { }

    public function about()
    {
        return view('pages.about');
    }
}
