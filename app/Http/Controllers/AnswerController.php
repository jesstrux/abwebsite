<?php

namespace App\Http\Controllers;

use App\Answer;
use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/admin/answers';

    public function __construct()
    {
      $this->folder = Answer::$folder;

      $this->forms = Answer::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::latest('updated_at')->get();
        return view($this->folder . '.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = QuestionCategory::all();
        $selectedCategories = null;
        return view($this->forms . '.create', compact('categories',
                                                      'selectedCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(), $this->errorMessages());
        DB::beginTransaction();
        $answer = null;
        try
        {
          $answer = Answer::create($request->only(['youtube_id', 'title']));
          $answer->questionCategories()->sync($request->question_category_id);
          DB::commit();
        }
        catch(\Throwable $e)
        {
          DB::rollBack();
          flash('Answer couldn\'t be saved')->error()->important();
          return back();
        }
        if($answer)
        {
          flash('Answer Created Successfully')->success();
          return redirect($this->redirectTo);
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
         'youtube_id' => 'required|string', //The Video-ID
         'title' => 'required|string', //Answers with same title are okay
         'question_category_id' => 'required',
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
         'question_category_id.required' => 'Atleast one question-category '.
                                            'is required',
       ];
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
      $categories = QuestionCategory::all();
      $selectedCategories = $answer->questionCategories()->get()->pluck('id');
      return view($this->forms . '.edit', compact('answer', 'categories',
                                                  'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
      $this->validate($request, $this->rules());
      DB::beginTransaction();
      try
      {
        Answer::where('id', $answer->id)
              ->update($request->only(['youtube_id', 'title']));
        $answer->questionCategories()->sync($request->question_category_id);

        DB::commit();

        flash('Answer Updated Successfully')->success();
        return redirect($this->redirectTo);
      }
      catch(\Throwable $e)
      {
        DB::rollBack();

        flash('Answer couldn\'t be updated')->error()->important();
        return back();
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        flash('Answer Deleted Successfully')->success();
        return redirect($this->redirectTo);
        // $answers = Answer::latest('updated_at')->get();
        // return view($this->folder . '.table', compact('answers'));
    }
}
