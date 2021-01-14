@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View All Users</h5>
</div>

@if(count($users) > 1)
    @foreach($users as $user)
        <div class="well">
            <h1>{{$user->user_name}}</h1>
        </div>
@else 
    <p>No Users</p>
@endif

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-top-countries">
                <tbody>

                    <tr>
                        <td>Name</td>
                        <td class="text-right">your name</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td class="text-right">your username</td>
                    </tr>
                    <tr>
                        <td>School ID</td>
                        <td class="text-right">#############</td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td class="text-right">## Year</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="text-right">your gender</td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td class="text-right">your course</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class="text-right">your email</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td class="text-right">your contact</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection