@extends('layouts.master')
@section('content')
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <img src="/images/logo.png" class="img-responsive logo">
            <h1 class="text-center">Eventsly</h1>
            <hr>
            <p>Find all the latest Events around you on Eventsly.</p>
            @if(auth()->check())
            @if(auth()->user()->hasRole('admin'))
            <div class="col-md-8 col-md-offset-2">
                <input type="text" name="new_category_name" value="" placeholder="Category name" class="form-control" id="new-category-name">
                <button type="button" class="btn btn-warning btn-xl" id="create-new-category">Create a new Category </button>
            </div>
            @endif
            @endif
            
            @if(auth()->check())
            @if(auth()->user()->hasRole('admin'))
            <div class="col-md-12 create-event-btn">
                <button type="button" class="btn btn-success btn-xl" data-toggle="modal" data-target="#create" >Add/Create Event </button>
                <p class="admin-p"> Hello Admin </p>
            </div>
            @endif
            @else
            <a href="#events" class="btn btn-primary btn-xl page-scroll">View Events</a>
            @endif
        </div>
    </div>
</header>
<div id="events">
    @if(!$categories)
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                No Events.
            </div>
        </div>
    </div>
    @else
    @foreach($categories as $index=>$category)
    @if($index % 2)
    <div class="content-section-a">
        <div class="container">
            <div class="col-md-5 right-border text-right">
                <hr class="section-heading-spacer" style="float:right;">
                <div class="clearfix"></div>
                <h2 class="section-heading"> {{ $category->name }} </h2>
            </div>
            <div class="col-md-5">
                @foreach($category->events as $event)
                <div class="row">
                    <div class="col-md-12 events-wrapper">
                        <div class="col-md-8"> <strong>{{ $event->name }}</strong> &nbsp;&nbsp;<i>({{ $event->date }})</i> </div>
                        <div class="col-md-4">
                            <a href="#" class="subscribe" data-toggle="modal" data-target="#subscribe" data-id="{{$event->id}}" >
                                <span class="glyphicon glyphicon-bullhorn"></span>
                            Subscribe </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@else
<div class="content-section-b">
    <div class="container">
        <div class="col-md-5 text-left col-md-offset-2">
            @foreach($category->events as $event)
            <div class="row">
                <div class="col-md-12 events-wrapper">
                    <div class="col-md-8"> <strong>{{ $event->name }} </strong>&nbsp;&nbsp;<i>({{ $event->date }})</i> </div>
                    <div class="col-md-4">
                        <a href="#" class="subscribe" data-id="{{$event->id}}" data-toggle="modal" data-target="#subscribe" >
                            <span class="glyphicon glyphicon-bullhorn"></span>
                        Subscribe </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-5 left-border" style="float:right;">
            <hr class="section-heading-spacer">
            <div class="clearfix"></div>
            <h2 class="section-heading"> {{ $category->name }} </h2>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

</div>
<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="/admin/create-new-event" accept-charset="UTF-8" id="create-new-event" enctype="multipart/form-data"> {!! csrf_field() !!}
            <div class="modal-header">
                <h4 class="js-title-step"></h4>
            </div>
            <div class="modal-body">
                <div class="row hide" data-step="1" data-title="Event Category:">
                    <div class="well">
                        @if(count($categories) > 0)
                        <div class="text-center">
                            <p style="margin-bottom:5px;"> Choose a Category </p>
                            <select  id="all-categories" name="category" required>
                                <option value="--" selected></option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <p class="or-divider"> Or </p>
                        @endif
                        <div>
                            <input type="text" name="category_name" value="" placeholder="Create a new Category" class="form-control" id="category-name">
                        </div>
                        
                        
                    </div>
                </div>
                <div class="row hide" data-step="2" data-title="Event Information:">
                    <div class="well">
                        <input type="text" name="event_name" value="" placeholder="Event name" class="form-control" id="event-name" required>
                        <input type="text" name="event_date" value="" placeholder="Event Date (DD-MM-YYYY)" class="form-control" id="event-date" style="margin-top:30px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
                <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
                <button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Subsribe Modal -->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enter your email address</h4>
        </div>
        <form method="POST" action="/subscribe" accept-charset="UTF-8" id="save-subscriber">
            {!! csrf_field() !!}
            <div class="modal-body subscribe-modal">
                <input type="hidden" name="event_id" id="eventId" value=""/>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="name" name="name" value="" placeholder="Enter your name" class="form-control" id="subsribe-name"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="email" name="email" value="" placeholder="Enter your email" class="form-control" id="subsribe-email"  required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="outline:none;" id="subsribe-btn">
                <span class="text-for-subscribe-btn">  Subscribe  </span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
</script>

@stop