@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h3 class="card-header text-center">Mails</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ Route('emails.create') }}" class="btn btn-success btn-sm">Create mail</a>
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>addressee<th>
                                    <th>matter<th>
                                    <th>message<th>
                                    <th>status<th>
                                </thead>
                                <tbody>
                                    @foreach ( $emails as $email )
                                        <tr>
                                            <td>{{$email->id}}</td>
                                            <td>{{$email->addressee}}</td>
                                            <td>{{$email->matter}}</td>
                                            <td>{{$email->message}}</td>
                                            <td class="text-danger">{{$email->status}}</td>
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