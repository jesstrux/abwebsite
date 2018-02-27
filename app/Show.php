<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public static function get_all(){
        return collect([
            ["title" => "Abella's Life Class",
                "subtitle" => "Life isn't just earning your first salary or even putting your kids...",
                "tv" => "TV ONE", "day" => "Friday", "time" => "03:30 PM"],

            ["title" => "Uongozi 101",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
                "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],

            ["title" => "Braving Beauty",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
                "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],

            ["title" => "Mwajiri na Mwajiriwa",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
                "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],

            ["title" => "His & Hers",
                "subtitle" => "Who is he, and who exactly is she is what we're trying to find...",
                "tv" => "AZAM TV", "day" => "Monday", "time" => "07:30 PM"],

            ["title" => "Nafsi Show",
                "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
                "tv" => "CLOUDS TV", "day" => "Wednesday", "time" => "10:30 PM"]
        ]);
    }
}
