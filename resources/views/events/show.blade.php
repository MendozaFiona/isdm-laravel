@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View Event</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <tbody>
                
                    <tr>
                        <td>Event Name</td>
                        <td>{{$event->event_name}}</td>
                    </tr>
                    <tr>
                        <td>Event Date</td>
                        <td>{{$event->event_date}}</td>
                    </tr>
                    <tr>
                        <td>Event Description</td>
                        <td>{{$event->event_desc}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection