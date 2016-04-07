<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\SubscriberRepo;

class NewSubscriber extends Job implements SelfHandling
{
    protected $name;
    protected $email;
    protected $event_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $email, $event_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->event_id = $event_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SubscriberRepo $repo)
    {
        return $repo->saveSubscriber($this->name, $this->email, $this->event_id);
    }
}
