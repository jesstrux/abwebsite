<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public static function get_all(){
        return collect([
            ["title" => "Nafsi Show",
                "subtitle" => "Nafsi is a TV show that aim to inspire viewers to be...",
                "description" => "Nafsi is a TV show that aim to inspire viewers to be students of life, admirers of the human spirit, and a platform where Tanzanians will be inspired to reflect on their personal development. The program aims at teaching on various proven strategies for finding not only lasting human success, but also joy, love and peace.",
                "tv" => "CLOUDS TV", "day" => "Wednesday", "time" => "10:30 PM"],

            ["title" => "Abella's Life Class",
                "subtitle" => "Abella’s life class is a life transformational audience based...",
                "description" => "Abella’s life class is a life transformational audience based TV program that showcases Abella’s life lessons, revelations and aha moments of her life’s acquired knowledge, experience and skills, broken down to help make your life better, happier, bigger, richer and more fulfilling.Abella shares her ideas, thoughts, and reflections about the lesson, and the show features interviews with guests whose life experiences relate to each topic. Every episode also features out of studio segments that captures true and inspiring living with aim with various friends and guests from around the world with aim to inspire a life bigger than self through inspired practical living.",
                "tv" => "TV ONE", "day" => "Friday", "time" => "03:30 PM"],
            ]);
    }
//        ["title" => "Uongozi 101",
//            "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
//            "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],
//
//        ["title" => "Braving Beauty",
//            "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
//            "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],
//
//        ["title" => "Mwajiri na Mwajiriwa",
//            "subtitle" => "Hosted every tuesday and thursday, Nafsi show talks about...",
//            "tv" => "TBC", "day" => "Sunday", "time" => "09:30 PM"],
//
//        ["title" => "His & Hers",
//            "subtitle" => "Who is he, and who exactly is she is what we're trying to find...",
//            "tv" => "AZAM TV", "day" => "Monday", "time" => "07:30 PM"]
//        ]);
//    }

    public static function get_episodes($id){
        $eps = collect([
            [
                [
                    "idx" => "1",
                    "title" => "Mambo yanayojenga au kubomoa Mahusiano.",
                    "date" => "MAY 23RD 2016",
                    "yt_id" => "s0JYwIYH01o"
                ],
                [
                    "idx" => "2",
                    "title" => "Jinsi ya kuishi maisha huru na kuacha kuridhisha watu.",
                    "date" => "MAY 30TH 2016",
                    "yt_id" => "hRqRPvcyHis"
                ],
                [
                    "idx" => "3",
                    "title" => "Jinsi ya kukabiliana na kukataliwa.",
                    "date" => "JUNE 13TH 2016",
                    "yt_id" => "vNcxEAe09kA"
                ],
                [
                    "idx" => "4",
                    "title" => "Jinsi ya Kuishi maisha yenye mtizamo chanya.",
                    "date" => "Jun 13, 2016",
                    "yt_id" => "_pan5xdHb54"
                ],
                [
                    "idx" => "5",
                    "title" => "Jinsi ya kupenda/Kupendwa na Kubaki kwenye Mapenzi.",
                    "date" => "JUL 26TH 2016",
                    "yt_id" => "00NHAPj2h5M"
                ],
                [
                    "idx" => "6",
                    "title" => "Uzalendo",
                    "date" => "JUL 26TH 2016",
                    "yt_id" => "MgHlWr_13kY"
                ],
                [
                    "idx" => "7",
                    "title" => "Umuhimu wa muonekano wa kwanza.",
                    "date" => "JUL 26TH 2016",
                    "yt_id" => "3HsLli1RmHI"
                ],
                [
                    "idx" => "8",
                    "title" => "Jinsi ya kukabiliana na Majanga.",
                    "date" => "JUL 26TH 2016",
                    "yt_id" => "KM9NDFsyEMM"
                ],
                [
                    "idx" => "9",
                    "title" => "Mambo yanayojenga na Kubomoa Ndoa.",
                    "date" => "AUG 1ST 2016",
                    "yt_id" => "SjKkuNdDy7s"
                ],
                [
                    "idx" => "10",
                    "title" => "Kizazi Kisicho na baba/Fatherless Generation.",
                    "date" => "AUG 2ND 2016",
                    "yt_id" => "x5mrx-RzHQQ"
                ],
                [
                    "idx" => "11",
                    "title" => "Jinsi ya kuanzisha biashara na kuwa mjasiliamali.",
                    "date" => "AUG 7TH 2016",
                    "yt_id" => "rHStL6-XHYs"
                ],
                [
                    "idx" => "13",
                    "title" => "Jinsi ya kutumia kipaji kama mtaji (Kipaji chako Mtaji wako).",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "flSSgj6jlH8"
                ],
                [
                    "idx" => "14",
                    "title" => "Akili Hisia(Emotional Intelligence).",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "x2q22EhB7BA"
                ],
                [
                    "idx" => "15",
                    "title" => "Uongozi (Leadership).",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "E-fYsn7eBow"
                ],
                [
                    "idx" => "16",
                    "title" => "Jinsi ya kuishi Maisha yenye Kusudi (How to live a purposeful life).",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "j6KXXmE5Kbk"
                ],
                [
                    "idx" => "17",
                    "title" => "Jinsi ya kuishi maisha yenye furaha.",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "un_fEKgq-u0"
                ],
                [
                    "idx" => "18",
                    "title" => "Umasikini ni Fikra.",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "4l_B6QeM_B8"
                ],
                [
                    "idx" => "19",
                    "title" => "insi ya kutengeneza Marafiki na Kuwa mtu mwenye Ushawishi.",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "crmHYHwgNME"
                ],
                [
                    "idx" => "20",
                    "title" => "The Art of Public Speaking.",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "RP6TTkQh84s"
                ],
                [
                    "idx" => "21",
                    "title" => "Time Management.",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "4k6CfgfqJlA"
                ],
                [
                    "title" => "Jinsi ya Kukabiliana na Hasira (Anger Management).",
                    "date" => "DEC 15TH 2016",
                    "yt_id" => "pYl0IB6jzgY"
                ]
            ],
            [
                [
                    "title" => "Abella Life Class Show Introduction",
                    "date" => "MAY 22ND 2016",
                    "yt_id" => "MT8m_SNMeCQ"
                ]
            ]
        ]);

        if(count($eps) > $id)
            return $eps[$id];
        else
            return collect([]);
    }
}
