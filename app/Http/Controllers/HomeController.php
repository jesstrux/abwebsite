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
        $page = "Home";

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

        return view('index', compact('page','inspirations', 'shows', 'blogs'));
    }

    public function about()
    {
        $page = "About";
        $lds = collect([
            [
                "title" => "EMPOW ER TO INSPIRE",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about..."
            ],
            [
                "title" => "POSTIVITY",
                "subtitle" => "Who is he, and who exactly is she is what we're trying to find..."
            ],
            [
                "title" => "ADVERSITY",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ],
            [
                "title" => "SMILE",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ],
            [
                "title" => "SELF LOVE",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ],
            [
                "title" => "PASSION AND GROWTH",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ],
            [
                "title" => "PRODUCTIVITY",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids..."
            ]
        ]);
        return view('about', compact('page', 'lds'));
    }

    public function ask()
    {
        $page = "Ask";
        $categories = [
            "Fashion",
            "Love and Relationship",
            "Finance",
            "Business",
            "Leadership",
            "Family",
            "About Abella"
        ];

        $answers = [
            ["category" => "Family", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["category" => "Love and Relationships", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["category" => "Finance", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["category" => "Fashion", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["category" => "Leadership", "answer" => "Life isn't just earning your first salary or even putting your kids..."]
        ];
        return view('ask', compact('page', 'categories', 'answers'));
    }

    public function show($id = 0)
    {
        $page = "Tv Show";
        $shows = [
            ["title" => "Nafsi Show", "tv" => "AZAM TV", "day" => "Monday", "time" => "07:30 PM"],
            ["title" => "His & Hers", "tv" => "CLOUDS TV", "day" => "Wednesday", "time" => "10:30 PM"],
            ["title" => "Abella's Life Class", "tv" => "TV ONE", "day" => "Friday", "time" => "03:30 PM"],
            ["title" => "Uongozi 101", "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"]
        ];
        $show = $shows[$id];

        $episodes = collect([
            [
                "title" => "Jinsi ya kuthamini mambo yote na sio unayoyapenda tu...",
                "date" => "Dec 5th"
            ],
            [
                "title" => "Why always me you ask? And to that I say why not always you?",
                "date" => "Dec 12th"
            ],
            [
                "title" => "Wisest man that ever lived(My father), told me do you see the way th...",
                "date" => "Dec 19th"
            ],
            [
                "title" => "Life isn't just earning your first salary or even putting your kids through private...",
                "date" => "Dec 26th"
            ],
            [
                "title" => "If you're life's a collection of ups, expect a major downfall coming your way...",
                "date" => "Jan 7th"
            ],
            [
                "title" => "Starting over can be hard, but sometimes it just can't be helped, so how does one...",
                "date" => "Jan 12th"
            ],
        ])->reverse();

        return view('tv_show', compact('page', 'show', 'episodes'));
    }
}
