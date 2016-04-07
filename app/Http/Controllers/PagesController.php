<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subscriber;
use App\Jobs\NewSubscriber;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('index',['categories' => $categories]);
    }


    public function subscribe(Request $request){
        $subscribed = Subscriber::where('event_id', $request->event_id)
                                ->where('email', $request->email)->first();
        if($subscribed != null){
            return "You have already Subscribed to this event";
        }else{
            $job = new NewSubscriber($request->name, $request->email, $request->event_id );
            return  $this->dispatch($job);
        }
    }
}
