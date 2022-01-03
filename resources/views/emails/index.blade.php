@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h3 class="card-header text-center">Mails</h3>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <a href="{{ Route('emails.create') }}" class="btn btn-success btn-sm">Create mail</a>
                            <table class="table table-striped" id="emails-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">addressee<th>
                                        <th scope="col">matter<th>
                                        <th scope="col">message<th>
                                        <th scope="col">status<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $emails as $email )
                                        <tr>
                                            <td scope="row">{{$email->id}}</td>
                                            <td>{{$email->addressee}}</td>
                                            <td>{{$email->matter}}</td>
                                            <td>{{$email->message}}</td>
                                            <td  class="text-danger">{{$email->status}}</td>
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