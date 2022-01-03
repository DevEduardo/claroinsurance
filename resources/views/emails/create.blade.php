@extends('app')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Send mail</h3>
                    <div class="card-body">

                        <form action="{{ route('email.send') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Addressee" id="addressee" class="form-control" name="addressee"
                                    required autofocus>
                                @if ($errors->has('addressee'))
                                <span class="text-danger">{{ $errors->first('addressee') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Matter" id="matter" class="form-control"
                                    name="matter" required>
                                @if ($errors->has('matter'))
                                <span class="text-danger">{{ $errors->first('matter') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Message" id="message" class="form-control" name="message"
                                    required autofocus>
                                @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Send</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection