@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone">
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Identification Card" id="identification_card" class="form-control" name="identification_card"
                                    required>
                                @if ($errors->has('identification_card'))
                                <span class="text-danger">{{ $errors->first('identification_card') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="date" id="date_of_birth" class="form-control" name="date_of_birth"
                                    required >
                                @if ($errors->has('date_of_birth'))
                                <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <select name="country" id="country" class="form-control"></select>
                                @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <select name="state" id="state" class="form-control"></select>
                                @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <select name="city" id="city" class="form-control"></select>
                                @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection