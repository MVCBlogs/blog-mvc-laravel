<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data["title"] = "Blog - Laravel";
        $data["description"] = "A clean blog with an MVC architecture in Laravel";
        return view('home.index')->with("data", $data);
    }

    public function about()
    {
        $data = [];
        $data["title"] = "About us";
        $data["description"] = "Information about the developers of this application";
        return view('home.about')->with("data", $data);
    }
}
