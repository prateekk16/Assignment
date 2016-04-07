<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\EventsRepo;

class NewEvent extends Job implements SelfHandling
{
     protected $name;
     protected $date;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EventsRepo $repo)
    {
         return $repo->saveEvent($this->name, $this->date);
    }
}
