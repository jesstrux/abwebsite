<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/questions';

    public function __construct()
    {
      $this->folder = Question::$folder;

      $this->forms = Question::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view($this->folder . '.index', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(), $this->errorMessages);
        DB::beginTransaction();
        $question = null;
        try {
          $follower = Follower::firstOrCreate($request->only('name', 'email'));
          $question = $follower->questions()->create([
            'question_category_id' => $request->question_category_id,
            'question' => $request->question,
          ]);
          DB::commit();
        }
        catch (Throwable $e)
        {
          DB::rollBack();
          flash('Sorry, Your Question couldn\'t be posted')->error()->important();
          return back();
        }
        if($question)
        {
          flash('Your Question was posted successfully')->success();
          return back();
        }
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
     private function rules()
     {
       return [
         'name' => 'required|string',
         'email' => 'required|email',
         'question' => 'required|string',
         'question_category_id' => 'required|integer',
       ];
     }

    /**
     * Get the validation error messages
     *
     * @return array
     */
     private function errorMessages()
     {
       return [
         'question_category_id.required' => 'Please select a category',
       ];
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view($this->folder . '.show', compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        flash('Question Deleted Successfully')->success();
        return redirect($this->redirectTo);
    }
}