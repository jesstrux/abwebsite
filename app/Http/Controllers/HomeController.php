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

    private function getEpisodes(){
        return collect([
            [
                "yt_id" => "_pan5xdHb54",
                "title" => "Jinsi ya kuthamini mambo yote na sio unayoyapenda tu...",
                "date" => "Dec 5th"
            ],
            [
                "yt_id" => "MgHlWr_13kY",
                "title" => "Why always me you ask? And to that I say why not always you?",
                "date" => "Dec 12th"
            ],
            [
                "yt_id" => "vNcxEAe09kA",
                "title" => "Wisest man that ever lived(My father), told me do you see the way th...",
                "date" => "Dec 19th"
            ],
            [
                "yt_id" => "rHStL6-XHYs",
                "title" => "Life isn't just earning your first salary or even putting your kids through private...",
                "date" => "Dec 26th"
            ],
            [
                "yt_id" => "3HsLli1RmHI",
                "title" => "If you're life's a collection of ups, expect a major downfall coming your way...",
                "date" => "Jan 7th"
            ],
            [
                "yt_id" => "3HsLli1RmHI",
                "title" => "Starting over can be hard, but sometimes it just can't be helped, so how does one...",
                "date" => "Jan 12th"
            ]
        ])->reverse();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = "Home";
        $page_title = "Abella Bateyunga";

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

        $blogs = [
            [
                "title" => "How I keep peaceful, productive thoughts as I take things one step at a time…",
                "url" => "https://medium.com/@abella.bateyunga/how-i-keep-peaceful-productive-thoughts-as-i-take-things-one-step-at-a-time-ac3b5cc8a75f"
            ],
            [
                "title" => "My 10 lessons on Leading young so far.",
                "url" => "https://medium.com/@abella.bateyunga/my-10-lessons-on-leading-young-so-far-e1a447e0e90"
            ]
        ];
        return view('index', compact('page', 'page_title', 'inspirations', 'shows', 'blogs'));
    }

    public function about()
    {
        $page = "About";
        $page_title = "About Me";

        $lds = collect([
            [
                "title" => "BELEIVE IN GOD",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about..."
            ],
            [
                "title" => "SELF LOVE"
            ],
            [
                "title" => "AUTHENTICITY"
            ],
            [
                "title" => "PASSION AND GROWTH"
            ],
            [
                "title" => "GIVING"
            ],
            [
                "title" => "LEADERSHIP"
            ],
            [
                "title" => "SMILE AND FUN"
            ],
            [
                "title" => "MENTORING AND NURTURING"
            ],
            [
                "title" => "INNER BEAUTY"
            ],
            [
                "title" => "POWER"
            ]
        ]);
        return view('about', compact('page', 'page_title', 'lds'));
    }

    public function ask()
    {
        $page = "Ask";
        $page_title = "Ask Abella";

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
            ["yt_id" => "_pan5xdHb54","category" => "Family", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["yt_id" => "MgHlWr_13kY","category" => "Love and Relationships", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["yt_id" => "vNcxEAe09kA","category" => "Finance", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["yt_id" => "rHStL6-XHYs","category" => "Fashion", "answer" => "Life isn't just earning your first salary or even putting your kids..."],
            ["yt_id" => "j6KXXmE5Kbk","category" => "Leadership", "answer" => "Life isn't just earning your first salary or even putting your kids..."]
        ];
        return view('ask', compact('page', 'page_title', 'categories', 'answers'));
    }

    public function show($id = null, $episode_id = null)
    {
        if($id == null)
            $id = 1;

        $page = "Tv Show";
        $shows = \App\Show::get_all();

        $show = $shows[$id - 1];
        $show['id'] = $id;

        $episodes = $this->getEpisodes();
//        $episodes = Show::get_episodes($id - 1);
        $page_title = "Tv Shows";

        return $show['id'];

        if($episode_id != null){
            $episode = $episodes[$episode_id%5];
            $episode['id'] = $episode_id;
            $other_episodes = $episodes;
            return view('tv_show_single', compact('page', 'page_title', 'show', 'episode', 'other_episodes'));
        }

        return view('tv_show', compact('page', 'page_title','show', 'episodes'));
    }

    public function feel_me($id = null, $episode_id = null)
    {
        if($id == null)
            $id = 1;

        $page = "Feel Me";
        $shows = [
            ["title" => "My piece of mind", "tv" => "AZAM TV", "day" => "Monday", "time" => "07:30 PM"],
            ["title" => "Spoken Word", "tv" => "CLOUDS TV", "day" => "Wednesday", "time" => "10:30 PM"],
            ["title" => "Moment of wisdom", "tv" => "TV ONE", "day" => "Friday", "time" => "03:30 PM"]
        ];
        $show = $shows[$id - 1];
        $show['id'] = $id;

        $episodes = $this->getEpisodes();

        $page_title = "Feel Me";

        if($episode_id != null){
            $episode = $episodes[$episode_id%5];
            $episode['id'] = $episode_id;
            $other_episodes = $episodes;
            return view('feel_me_single', compact('page', 'page_title', 'show', 'episode', 'other_episodes'));
        }

        return view('feel_me', compact('page', 'page_title','show', 'episodes'));
    }
}
