<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // Set the default slider image path
        $sliderImage = 'slider.jpg';

        return view('welcome', compact('sliderImage'));
    }
    public function about()
    {
        // Set the default slider image path
        $sliderImage = 'about.jpg';


        return view('aboutsoftware', compact('sliderImage'));
    }
    public function scan()
    {
        // Set the default slider image path
        $sliderImage = 'about.jpg';


        return view('login', compact('sliderImage'));
    }
    public function login()
    {
        // Set the default slider image path
        $sliderImage = 'about.jpg';


        return view('login', compact('sliderImage'));
    }

}
