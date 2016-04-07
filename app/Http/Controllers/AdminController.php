<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Event;

class AdminController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = new Category;
        $category->name = $request->cname;
        if($category->save())
            return 1;

        return 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(trim($request->cname1) != "undefined" && trim($request->ename) != ""){
            $category = Category::where('id',$request->cname1)->firstOrFail();
            $event = new Event;
            $event->name = $request->ename;
            $event->date = $request->date;
            $event->save();
            if( $category->events()->save($event))
            return 1;
        }elseif(trim($request->cname) != "" && trim($request->ename) != ""){
            $category = new Category;
            $category->name = $request->cname;
            $category->save();

            $event = new Event;
            $event->name = $request->ename;
            $event->date = $request->date;
            $event->save();

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
