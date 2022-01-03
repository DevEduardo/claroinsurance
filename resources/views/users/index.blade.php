@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h3 class="card-header text-center">Users</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ Route('registration') }}" class="btn btn-success btn-sm">Create user</a>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name<th>
                                        <th>Email<th>
                                        <th>Phone<th>
                                        <th>Identification card<th>
                                        <th>Date of birth<th>
                                        <th>Edad<th>
                                        <th>City<th>
                                        <th>Actions<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $users as $user )
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->identification_card}}</td>
                                            <td>{{$user->date_of_birth}}</td>
                                            <td>{{$user->date_of_birth}}</td>
                                            <td>{{$user->city}}</td>
                                            <td>
                                                <a href="{{ Route('user.update', $user->id) }}" class="btn btn-info btn-sm">Update</a>
                                                <a href="{{ Route('user.delete', $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection