<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionCategory;

class CmsController extends Controller
{

    public function index()
    {
      $categories = QuestionCategory::latest('updated_at')->get();
      return view(QuestionCategory::$folder . '.index', compact('categories'));
    }
}
