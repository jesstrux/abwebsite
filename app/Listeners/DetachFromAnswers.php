<?php

namespace App\Listeners;

use App\Events\QuestionCategoryDeleting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DetachFromAnswers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QuestionCategoryDeleting  $event
     * @return void
     */
    public function handle(QuestionCategoryDeleting $event)
    {
        $event->questionCategory->answers()->detach();
    }
}
