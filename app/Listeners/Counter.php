<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Counter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(VideoViewer $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {

            if (!session()->has('views')) {

            $this->updateview($event->video);
        }else{
            return false;
        }


    }

    function updateview($video){

    $video -> viewer =  $video -> viewer  + 1;

    $video -> save();

    session()-> put('views', $video -> id);

    }

}
