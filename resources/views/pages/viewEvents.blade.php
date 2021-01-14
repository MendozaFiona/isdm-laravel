@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View All Events</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <thead class="thead-dark">
                    <tr>
                        <th>Event ID</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Description</th>
                    </tr>
                </thead>

                <tbody>

                    @if(count($events) > 1)
                        @foreach($events as $event)
                                <tr onclick="window.location='/events/{{$event->event_id}}'">
                                    <td>{{$event->event_id}}</td>
                                    <td>{{$event->event_name}}</td>
                                    <td>{{$event->event_date}}</td>
                                    <td>{{$event->event_desc}}</td>
                                </tr>
                        @endforeach
                    @else 
                        <p>No events</p>
                    @endif

                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection