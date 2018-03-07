<?php

namespace App\Http\Controllers;

use App\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionCategoryController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/admin/question_categories';

    public function __construct()
    {
      $this->folder = QuestionCategory::$folder;

      $this->forms = QuestionCategory::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = QuestionCategory::latest('updated_at')->get();
        return view($this->folder . '.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->forms . '.create');
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
        QuestionCategory::create($request->all());
        flash('Category Created Successfully')->success();
        return redirect($this->redirectTo);
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
     private function rules(string $id = null)
     {
       return [
         'name' => [
           'required', 'string',
           Rule::unique('question_categories')
               ->ignore($id)
               ->where(function($query) {
                 return $query->where('deleted_at', null);
               }),
         ],
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
         'name.unique' => 'A category with the same name exists',
       ];
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionCategory $questionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionCategory $questionCategory)
    {
        $category = $questionCategory;
        return view($this->forms . '.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionCategory $questionCategory)
    {
      $this->validate($request, $this->rules($questionCategory->id));
      $questionCategory->update($request->all());
      flash('Category Updated Successfully')->success();
      return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionCategory  $questionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionCategory $questionCategory)
    {
        $questionCategory->delete();
        // flash('Category Deleted Successfully')->success();
        $categories = QuestionCategory::latest('updated_at')->get();
        return view($this->folder . '.table', compact('categories'));
    }

    public function getQuestions(QuestionCategory $questionCategory)
    {
      $questions = $questionCategory->questions()->get();
      return view($this->folder . '.questions', compact('questions'));
    }
}
