@extends('layouts/admin')

@section('content')
<div class="au-card recent-report">
    <h5 class="title-2">User Profile</h5>
</div>

<div class="au-card au-card-top-countries m-b-40">
    <div class="au-card-inner">
        <div class="table-responsive">
            <table class="table table-top-countries">
                <tbody>
                    <tr>
                        <td>User ID</td>
                        <td class="text-right">{{ Auth::user()->id }}</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td class="text-right">{{ Auth::user()->username }}</td>
                    </tr>

                    @if(Auth::user()->student_id != null)
                        <tr>
                            <td>School ID</td>
                            <td class="text-right">{{ Auth::user()->student_id }}</td>
                        </tr>
                    @endif

                    @if(Auth::user()->student_id == null)
                        <tr>
                            <td>Teacher ID</td>
                            <td class="text-right">{{ Auth::user()->teacher_id }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Role</td>
                            @if(Auth::user()->role_id == 1)
                                <td class="text-right">Moderator</td>
                            @endif

                            @if(Auth::user()->role_id == 2)
                                <td class="text-right">Member</td>  
                            @endif
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection