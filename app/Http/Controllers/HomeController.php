<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspirations = [
            [
                "title" => "Forward afro fashion",
                "subtitle" => "A headwrap here, a kitenge there, showing africa to the world..."
            ],
            [
                "title" => "Moments of wisdom",
                "subtitle" => "Jinsi ya kuishi maisha huru na kuacha kuridhisha watu..."
            ],
            [
                "title" => "Office etiquette",
                "subtitle" => "Customer's value a person who respects their workspace, here's..."
            ],
        ];

        $shows = [
            [
                "title" => "Nafsi Show",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about..."
            ],
            [
                "title" => "His & Hers",
                "subtitle" => "Who is he, and who exactly is she is what we're trying to find..."
            ],
            [
                "title" => "Abella’s Life clas",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ],
        ];

        $blogs = ["The Art of cooking brings back the family.", "It’s our minds that are poor,never mind I am a dummy text"];

        return view('index', compact('inspirations', 'shows', 'blogs'));
    }
}
