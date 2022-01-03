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
                            <a href="{{ Route('registration') }}" class="btn btn-success btn-sm mb-5">Create user</a>
                            <table class="table table-striped" id="userss-table">
                                <thead>
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Name<th>
                                        <th scope="col">Email<th>
                                        <th scope="col">Phone<th>
                                        <th scope="col">Identification card<th>
                                        <th scope="col">Date of birth<th>
                                        <th scope="col">Edad<th>
                                        <th scope="col">City<th>
                                        <th scope="col">Actions<th>
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