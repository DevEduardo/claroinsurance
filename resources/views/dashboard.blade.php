@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header text-center">User data</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Name: <b>{{ Auth::user()->name }}</b></p>
                                <p>Identification card: <b>{{ Auth::user()->identification_card }}</b></p>
                                <p>Rol: <b>{{ Auth::user()->rol_id }}</b></p>
                            </div>
                            <div class="col-md-5">
                                <p>Email: <b>{{ Auth::user()->email }}</b></p>
                                <p>Phone: <b>{{ Auth::user()->phone }}</b></p>
                                <p>City: <b>{{ Auth::user()->city }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection