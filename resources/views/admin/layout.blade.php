<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Адмін-панель</title>
</head>

<body>
    <h1>Панель адміністратора</h1>
    <div class="header">
        <div class="heder1">
            <b>Дії</b>

            <button class="btn"><a class="link-style" href="/admin/car">Список автомоблів</a></button>
            <button class="btn"> <a class="link-style" href="/admin/car/create">Додати автомобіль</a></button>
            <button class="btn"><a class="link-style" href="/admin/company">Список компаній</a></button>
            <button class="btn"> <a class="link-style" href="/admin/company/create">Додати компанію</a></button>

            <br />
        </div>
        <div class="header2">
            <b>Кабінет</b>


            <button class="btn"><a class="link-style" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form style="display:none;" id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
            </button>



            <button class="btn"><a class="link-style" href="/">Frontend</a></button>

        </div>
    </div>
    <div>
        @yield('content')
    </div>
</body>
