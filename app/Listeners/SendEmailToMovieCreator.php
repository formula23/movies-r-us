<?php

namespace App\Listeners;

use App\Mail\MovieReviewSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToMovieCreator
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event->review->movie->user->email)->send(new MovieReviewSubmitted($event->review));
    }
}
