<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Repositories\CategoryRepo;

class NewCategory extends Job implements SelfHandling
{
    protected $name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepo $repo)
    {
        return $repo->saveCategory($this->name);
    }
}
