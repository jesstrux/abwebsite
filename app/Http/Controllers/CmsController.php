<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionCategory;

class CmsController extends Controller
{
    private $redirectTo = '/admin';

    public function index()
    {
      $categories = QuestionCategory::latest('updated_at')->get();
      return view(QuestionCategory::$folder . '.index', compact('categories'));
    }

    public function updateProfilePicture(Request $request)
    {
      $this->validate($request, $this->pictureRules());
      $user = $request->user();
      $user->clearMediaCollection('profile_pictures');
      $user->addMediaFromRequest('profile_picture')
           ->toMediaCollection('profile_pictures');
    }

    private function pictureRules()
    {
      return [
        'profile_picture' => 'bail|file|image|max:2048',
      ];
    }
}
