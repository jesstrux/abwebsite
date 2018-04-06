<?php

namespace App\Http\Controllers;

use App\SeriesCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeriesCategoryController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/admin/series_categories';

    public function __construct()
    {
      $this->folder = SeriesCategory::$folder;

      $this->forms = SeriesCategory::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = SeriesCategory::latest('updated_at')->get();
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
        $this->validate($request, $this->rules(). $this->errorMessages());
        SeriesCategory::create($request->all());
        flash('Category Created Successfully')->success();
        return redirect($this->redirectTo);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    private function rules(string $id = null)
    {
      return [
        'name' => ['required', 'string',
                    Rule::unique('series_categories')
                        ->ignore($id)
                        ->where(function ($query) {
                         return $query->where('deleted_at', null);
                    }),
                   ],
      ];
    }

    /**
     * Get the validation error messages.
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
     * @param  \App\SeriesCategory  $seriesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SeriesCategory $seriesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeriesCategory  $seriesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SeriesCategory $seriesCategory)
    {
        $category = $seriesCategory;
        return view($this->forms . '.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeriesCategory  $seriesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeriesCategory $seriesCategory)
    {
        $this->validate($request, $this->rules($seriesCategory->id));
        $seriesCategory->update($request->all());
        flash('Category Updated Successfully')->success();
        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeriesCategory  $seriesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeriesCategory $seriesCategory)
    {
        $seriesCategory->delete();
        flash('Series-Category Deleted Successfully')->success();
        return redirect($this->redirectTo);
        // $categories = SeriesCategory::latest('updated_at')->get();
        // return view($this->folder . '.table', compact('categories'));
    }

    public function getSeries(SeriesCategory $seriesCategory)
    {
      return $seriesCategory->series()->get();
    }
}
