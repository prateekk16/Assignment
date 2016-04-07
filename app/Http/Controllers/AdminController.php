<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Event;
use App\Jobs\NewCategory;
use App\Jobs\NewEvent;

class AdminController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $job = new NewCategory($request->cname);
        return $this->dispatch($job);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(trim($request->cname1) != "--" && trim($request->ename) != ""){
            $category = Category::where('id',$request->cname1)->firstOrFail();

            $job = new NewEvent($request->ename, $request->date);
            $event =  $this->dispatch($job);

            if( $category->events()->save($event))
            return 1;
        }elseif(trim($request->cname) != "" && trim($request->ename) != ""){
            $job = new NewCategory($request->cname);
            $category =  $this->dispatch($job);

            $job1 = new NewEvent($request->ename, $request->date);
            $event =  $this->dispatch($job1);

           if( $category->events()->save($event))
            return 1;
        }
        return 0;
    }

    public function subscribers(){
        $events = Event::all();
        return view('subscribers', ['events'=>$events]);
    }


}
