<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class CmsController extends Controller
{

    public function index()
    {
      $questions = Question::latest('updated_at')->get();
      return view(Question::$folder . '.index', compact('questions'));
    }
}
