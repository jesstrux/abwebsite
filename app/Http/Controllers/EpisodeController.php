<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/episodes';

    public function __construct()
    {
      $this->folder = Episode::$folder;

      $this->forms = Episode::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::all();
        return view($this->folder . '.index', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SeriesCategory::pluck('name', 'id');
        // $series = Series::pluck('title', 'id');
        return view($this->forms . '.create', compact('categories'));
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
        $episode = null;
        try {
          $episode = Episode::create($request->all());
          $episode->addAllMediaFromRequest()
                  ->each( function($episodeImage) {
                      $episodeImage->toMediaCollection('episode_images');
                  });
          DB::commit();
        }
        catch (Throwable $e)
        {
          DB::rollBack();
          flash('Error: Episode couldn\'t be created')->error()->important();
          return back();
        }
        if($episode)
        {
          flash('Episode Created Successfully')->success();
          return redirect($this->redirectTo);
        }
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
           'required', 'string',
           Rule::unique('episodes')
               ->ignore($id)
               ->where(function($query) {
                 return $query->where('deleted_at', null);
               }),
         ]
         'series_category_id' => 'required|integer',
         'series_id' => 'required|integer',
         'date_aired' => 'required',
         'youtube_url' => 'required',
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
         'title.unique' => 'An episode with the same title exists',
         'series_category_id.required' => 'Please select a category',
         'series_id.required' => 'Please select a series',
       ];
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        $images = $episode->getMedia();
        return view($this->forms . '.edit', compact('episode', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $this->validate($request, $this->rules($episode->id));
        $episode->update($request->all());
        flash('Episode Updated Successfully')->success();
        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        flash('Episode Deleted Successfully')->success();
        return redirect($this->redirectTo);
    }
}