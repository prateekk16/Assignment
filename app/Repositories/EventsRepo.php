<?php

namespace App\Repositories;

use App\Event;

class EventsRepo{

	public function saveEvent($name, $date){
		 $event = new Event;
         $event->name = $name;
         $event->date = $date;
         $event->save();

        return $event;
	}

}


?>