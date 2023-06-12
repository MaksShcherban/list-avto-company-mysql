<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <title>Автосалон</title>
</head>

<body>
    @yield('page_title')

    <div class="container">

        @yield('content')

    </div>
    <br /><br />


</body>
@include('app.layouts.footer')


</html>
