<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index($post_id,$not_id){
        
        $not=Notification::find($not_id);
        $not->read=1;
        $not->save();
        return redirect()->route('posts.show',[$post_id]);
    }

}
