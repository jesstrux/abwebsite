<?php

namespace App\Http\Controllers;

use App\NewsFeed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsFeedController extends Controller
{
    private $folder, $forms;

    private $redirectTo = '/admin/news_feeds';

    public function __construct()
    {
      $this->folder = NewsFeed::$folder;

      $this->forms = NewsFeed::$forms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $newsFeeds = $this->getNewsFeeds();
      return view($this->folder . '.index', compact('newsFeeds'));
    }

    public function getNewsFeeds()
    {
      return NewsFeed::latest('updated_at')->get();
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
      NewsFeed::create($request->all());
      flash('NewsFeed Created Successfully')->success();
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
           'required', 'string',
           Rule::unique('news_feeds')
               ->ignore($id)
               ->where(function($query) {
                 return $query->where('deleted_at', null);
               }),
         ],
         'youtube_id' => 'required',
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
         'title.unique' => 'A news-feed with the same title exists',
       ];
     }


    /**
     * Display the specified resource.
     *
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function show(NewsFeed $newsFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsFeed $newsFeed)
    {
      return view($this->forms . '.edit', compact('newsFeed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsFeed $newsFeed)
    {
      $this->validate($request, $this->rules($newsFeed->id), $this->errorMessages());
      $newsFeed->update($request->all());
      flash('NewsFeed Updated Successfully')->success();
      return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsFeed $newsFeed)
    {
      $newsFeed->delete();
      flash('NewsFeed Deleted Successfully')->success();
      return redirect($this->redirectTo);
      // $newsFeeds = $this->getNewsFeeds();
      // return view($this->folder . '.index', compact('newsFeeds'));
    }
}
