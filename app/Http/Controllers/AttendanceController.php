<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('pages/createAttendance')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //HERE!!! SHOW PAGE HERE
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required',
            //'event_id' => 'required', // please put a restriction on format! including in the view page!
        ]);

        $att = new Attendance;

        $att->student_id = $request->input('student_id');
        $att->event_id = $id;
        
        $att->save();
        
        return redirect('/attendance')->with('success', 'Attendance Successful');
    }

    public function createAttendance(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required',
            //'event_id' => 'required', // please put a restriction on format! including in the view page!
        ]);

        $att = new Attendance;

        $att->student_id = $request->input('student_id');
        $att->event_id = $id;
        
        $att->save();
        
        return redirect('/attendance')->with('success', 'Attendance Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('id', $id)->first();
        return view('attendance/show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
