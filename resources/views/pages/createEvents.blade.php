@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">Create Events</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="event name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Event Date</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="yyyy/mm/dd">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Event Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="event description"></textarea>
                  </div>
                <button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection