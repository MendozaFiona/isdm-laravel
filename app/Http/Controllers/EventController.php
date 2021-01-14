<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\Event;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return view('pages/viewEvents')->with('events', $events);
    }

   
    public function create()
    {
        $validator = Validator::make($request->all(),[
            'event_name' => 'required',
            'event_date' => 'required', // please put a restriction on format! including in the view page!
            'event_desc' => 'required',

        ]);

        if($validator->fails()){

            $errors = $validator->errors(); // detects errors and stores in individual variables
            $err = array(
                // ff. stores detected errors for each field in ther $err array
                'event_name' => $errors->first('event_name'),
                'event_date' => $errors->first('event_date'),
                'event_desc' => $errors->first('event_desc'),
            );

            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'errors' => $err
            ), 422);

        }

        $event = new Event;

        $event->event_name = $request->input('event_name');
        $event->event_desc = $request->input('event_desc');
        $event->event_date = $request->input('event_date');
        
        $event->save();
        
        return response()->json(array(
            'message' => 'Registration Successful',
            'event' => $event
        ), 201);

    }


    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $event = Event::where('event_id','=',$id)->first();
        return view('events/show')->with('event', $event);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
