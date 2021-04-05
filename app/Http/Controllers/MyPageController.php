<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use Inertia\Inertia;
use App\Models\Event;
use App\Services\EventService\NotificationInterface;
use stdClass;

class MyPageController extends Controller
{
    protected $notification;
    
    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function events()
    {                   
        // $event = Event::where(['user_id' => Auth()->user()->id])->get();
        // dd($event);
        
        return Inertia::render('MyPage/Events', [
            // 'title' => 'Hello Inertia ' . date('Y-m-d H:i:s'), 
            'events' => Event::where(['user_id' => Auth()->user()->id])
            ->get(['id', 'title', 'description', 'date']),             
        ]);
    }
}