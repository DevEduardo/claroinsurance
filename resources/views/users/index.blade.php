@extends('app')

@section('content')
<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h3 class="card-header text-center">Users</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ Route('registration') }}" class="btn btn-success btn-sm mb-5">Create user</a>
                            <table class="table table-striped" id="userss-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Identification card</th>
                                        <th>Date of birth</th>
                                        <th>Edad</th>
                                        <th>City</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection