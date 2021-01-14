@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">View User</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-hover table-top-countries">
                <tbody>
                
                    <tr>
                        <td>Username</td>
                        <td>{{$user->user_name}}</td>
                    </tr>
                    <tr>
                        <td>Student ID</td>
                        <td>{{$user->student_id}}</td>
                    </tr>
                    <tr>
                        <td>User Role</td>
                        <td>{{$user->role_id}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-danger btn-lg">Delete User</button>
        <button type="button" class="btn btn-warning btn-lg pull-right">Edit User</button>
        </div>
</div>
@endsection