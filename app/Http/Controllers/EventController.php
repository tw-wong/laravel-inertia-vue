<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use Inertia\Inertia;
use App\Models\Event;
use App\Services\EventService\NotificationInterface;
use stdClass;

class EventController extends Controller
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
    public function index()
    {
        // return Inertia::render('Events/Index', [
        //     'events' => Event::all(), 
        // ]);
            
        
        return Inertia::render('Events/Index', [
            // 'title' => 'Hello Inertia ' . date('Y-m-d H:i:s'), 
            'events' => Event::all(),             
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Events/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventCreateRequest $request)
    {
        
        $data = $request->validated();        
        Event::create($data);
        
        
        $user = new stdClass;
        $user->name = 'Hello';
        $message = 'Create success message';
        $this->notification->send($user, $message);
        
        return redirect()->route('events.index')->with('message', 'Event has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $event = Event::findOrFail($id);
        
        return Inertia::render('Events/Show', [
            'event' => $event->only('id', 'title', 'description', 'date'), 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $event = Event::findOrFail($id);
        
        return Inertia::render('Events/Edit', [
            'event' => $event->only('id', 'title', 'description', 'date'), 
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        
        Event::where('id', $id)->update($data);
        return redirect()->route('events.index')->with('message', 'Event has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {        
        Event::destroy($id);
        return redirect()->route('events.index')->with('message', 'Event has been deleted.');
    }
}
