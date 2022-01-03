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

            $.ajax({
                url: 'https://www.universal-tutorial.com/api/getaccesstoken',
                method: 'GET',
                headers: {
                    "Accept": "application/json",
                    "api-token": "NnBvIhJxQFngTk3PT7m5zUR01Gkd_3QYDXNE__wzji_-owXyVR8i1knLDkHtimU8O1U",
                    "user-email": "eduardosaesdev@gmail.com"
                },
                success: function (data) {
                    if(data.auth_token){
                        var auth_token = data.auth_token;
                        $.ajax({
                            url: 'https://www.universal-tutorial.com/api/countries/',
                            method: 'GET',
                            headers: {
                                "Authorization": "Bearer " + auth_token,
                                "Accept": "application/json"
                            },
                            success: function (data) {
                                var countries = data;
                                var comboCountries = "<option value=''>Seleccionar</option>";
                                countries.forEach(element => {
                                    comboCountries += '<option value="' + element['country_name'] + '">' + element['country_name']+'</option>';
                                });

                                $("#country").html(comboCountries);
                                // State list
                                $("#country").on("change", function(){
                                    var country = this.value;
                                    $.ajax({
                                        url: 'https://www.universal-tutorial.com/api/states/' + country,
                                        method: 'GET',
                                        headers: {
                                            "Authorization": "Bearer " + auth_token,
                                            "Accept": "application/json"
                                        },
                                        success: function (data) {
                                            var states = data;
                                            var comboStates = "<option value=''>Seleccionar</option>";
                                            states.forEach(element => {
                                                comboStates += '<option value="' + element['state_name'] + '">' + element['state_name'] + '</option>';
                                            });
                                            $("#state").html(comboStates);

                                            // City list

                                            $("#state").on("change", function () {
                                                var state = this.value;

                                                $.ajax({
                                                    url: 'https://www.universal-tutorial.com/api/cities/' + state,
                                                    method: 'GET',
                                                    headers: {
                                                        "Authorization": "Bearer " + auth_token,
                                                        "Accept": "application/json"
                                                    },
                                                    success: function (data) {
                                                        var cities = data;
                                                        var comboCities = "<option value=''>Seleccionar</option>";
                                                        cities.forEach(element => {
                                                            comboCities += '<option value="' + element['city_name'] + '">' + element['city_name'] + '</option>';
                                                        });
                                                        $("#city").html(comboCities);
                                                        if (thisClass.cityValue) { $("#city").val(thisClass.cityValue).trigger("change"); }

                                                    },
                                                    error: function (e) {
                                                        console.log("Error al obtener countries: " + e);
                                                    }
                                                });

                                            });

                                            if (thisClass.stateValue) { $("#item-details-stateValue").val(thisClass.stateValue).trigger("change"); }

                                        },
                                        error: function (e) {
                                            console.log("Error al obtener countries: " + e);
                                        }
                                    });

                                });

                                if (thisClass.countryValue) { $("#country").val(thisClass.countryValue).trigger("change"); }

                            },
                            error: function (e) {
                                console.log("Error al obtener countries: " + e);
                            }
                        });

                    }
                },
                error: function (e) {
                    console.log("Error al obtener countries: " + e);
                }
            });
        });
    </script>
</html>
