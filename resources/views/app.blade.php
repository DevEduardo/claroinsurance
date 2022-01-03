<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Claro Insurance</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

    </head>
    <body class="antialiased">
        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Claro Insurance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    @guest
                    @else
                    @if (Auth::user()->rol_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">Users</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('emails') }}">Emails</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
                        @yield('content')
    </body>
    <script>
        $(document).ready(function () {
            $('#emails-table').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax":{
                    "url": "{{ url('get/emails/') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "#" },
                    { "data": "addressee" },
                    { "data": "matter" },
                    { "data": "message" },
                    { "data": "status" },
                ]
            });
            $('#userss-table').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax":{
                    "url": "{{ url('get/users/') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "#" },
                    { "data": "Name" },
                    { "data": "Email" },
                    { "data": "Phone" },
                    { "data": "Identification card" },
                    { "data": "Date of birth" },
                    { "data": "Edad" },
                    { "data": "City" },
                    { "data": "Actions" },
                ]
            });
        });
    </script>
</html>
