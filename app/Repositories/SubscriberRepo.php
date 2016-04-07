<?php

namespace App\Repositories;

use App\Subscriber;

class SubscriberRepo{

	public function saveSubscriber($name, $email, $event_id){
			$new = new Subscriber;
            $new->name = $name;
            $new->email = $email;
            $new->event_id = $event_id;
            if($new->save())
                    return "Thank you for Subscribing";
	}

}


?>