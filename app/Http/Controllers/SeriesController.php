<?php

namespace App\Http\Controllers;

use App\Series;
use App\SeriesCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeriesController extends Controller
{
    private $folder;

    private $forms;

    private $redirectTo = '/series';

    public function __construct()
    {
      $this->folder = Series::$folder;

      $this->forms = Series::$forms;
    }

    private function getWeekDays()
    {
      $days = [
        'Sunday', 'Monday', 'Tuesday',
        'Wednesday', 'Thursday', 'Friday', 'Saturday'
      ];

      $index = 0; $weekDays = [];
      foreach ($days as $day) {
        $weekDays[$index++] = $day;
      }

      return $weekDays;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::latest('updated_at')->get();
        $series = Series::first()->category()->first();
        return view($this->folder . '.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SeriesCategory::pluck('name', 'id');
        $days = $this->getWeekDays();
        $selectedCategory = null;
        return view($this->forms . '.create',
                            compact('categories', 'days', 'selectedCategory'));
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
        Series::create($request->all());
        flash('Series Created Successfully')->success();
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
         'title' => [
           'required',
           'string',
           Rule::unique('series')
               ->ignore($id)
               ->where(function($query) {
                 return $query->where('deleted_at', null);
               }),
           'series_category_id' => 'required|integer',
           'day' => 'required',
           'air_time' => 'required',
           'channel' => 'required',
         ]
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
         'title.unique' => 'A series with the same title exists',
         'series_category_id.required' => 'Please select a category',
       ];
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        $days = $this->getWeekDays();
        $selectedCategory = $series->category()->first();
        return view($this->forms . '.edit',
            compact('series', 'days', 'selectedCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        $this->validate($request, $this->rules($series->id));
        $series->update($request->all());
        flash('Series Updated Successfully')->success();
        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        $series->delete();
        // flash('Series Deleted Successfully')->success();
        $series = Series::latest('updated_at')->get();
        return view($this->folder . '.table', compact('series'));
    }
}
