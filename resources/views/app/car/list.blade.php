@extends('app.layouts.layout')


@section('page_title')
    <div class="title">
        <b> Автосалон вживаних авто</b>
    </div>
@endsection


@section('content')
    <div class="container">
        <div class="block one-find">
            <h1>Пошук за параметрами</h1>
            <form method="get" class="form1" action="">
                <div class="form1_1">
                    <label>Марка</label>
                    <input class="input-text" type="text" name="search_marka" placeholder="Введіть марку"
                        value="{{ isset($search_marka) ? $search_marka : '' }}">

                    <label>Колір</label>
                    <select class="input-text" name="search_color" id="">
                        <option value="">Колір не обрано</option>
                        @foreach ($color as $car)
                            @if (isset($search_color) && $search_color == $car->color)
                                <option value="{{ $car->color }}" selected>{{ $car->color }}</option>
                            @else
                                <option value="{{ $car->color }}">{{ $car->color }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="form1_3">
                    <label>Ціна</label>
                    <input class="input-text" type="numder" name="prise_min" placeholder="Введіть мінімум"
                        value="{{ isset($search_prise_min) ? $search_prise_min : '' }}">
                    <input class="input-text" type="numder" name="prise_max" placeholder="Введіть максимум"
                        value="{{ isset($search_prise_max) ? $search_prise_max : '' }}">

                    {{-- <div class="form1_3">
            <input type="numder" name="prise2" placeholder="Введіть ціну 1">
            <input type="numder" name="prise3" placeholder="Введіть ціну 2 ">
        </div> --}}
                    <label>Рік</label>
                    <input class="input-text" type="numder" name="year" placeholder="Введіть рік "
                        value="{{ isset($search_year) ? $search_year : '' }}">
                </div>

                <label>Компанія</label>
                <select class="input-text" name="search_comp" id="">
                    <option value="">Оберіть компанію</option>
                    @foreach ($name_company as $car)
                        @if (isset($search_comp) && $search_comp == $car->compani)
                            <option value="{{ $car->compani }}" selected>{{ $car->compani }}</option>
                        @else
                            <option value="{{ $car->compani }}">{{ $car->compani }}</option>
                        @endif
                    @endforeach
                </select>
                <button class="btn one-btn" type="submit" name="sub_form">Знайти</button>
            </form>

            @if (isset($_GET['sub_form']) &&
                    ($search_marka || $search_color || $search_prise_min || $search_prise_max || $search_year || $search_comp))
                @if ($CarSearch != null && isset($CarSearch[0]))
                    <table class="search-cars">
                        <thead>
                            <tr>
                                <th class="table-border">ID</th>
                                <th class="table-border width">Марка</th>
                                <th class="table-border">Модель</th>
                                <th class="table-border">Рік</th>
                                <th class="table-border">Колір</th>
                                <th class="table-border">Ціна, $ </th>
                                <th class="table-border width-200 ">Компанія</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($CarSearch as $car)
                                <tr>
                                    <td>{{ $car->idCar }}</td>
                                    <td>{{ $car->marka }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->cost }} $</td>
                                    <td>{{ $car->compani }}</td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table><br>
                @else
                    <div class='error-text'>Помилка: Не знайдено значень, задовольняючих критерій</div>
                @endif
            @elseif(!(isset($_GET['sub_form']) && ($search_marka || $search_color || $search_prise || $search_year || $search_comp)))
                <div class='error-text'>Помилка: Заповніть хоч одну форму</div>
            @endif

        </div>


        <div class="block">
            <form method="get" action="/car" class="modal">
                @csrf
                <label>
                    <input class="input-text" type="text" name="param" class="paramclass"
                        placeholder="Значення параметру" value="{{ isset($param_car) ? $param_car : '' }}">
                </label>
                <label>
                    <select class="input-text" name="type" style="width:200px">
                        @foreach ($search_types_car as $type_id => $type_title)
                            <option value="{{ $type_id }}" {{ $type_id == $type_selected_car ? 'selected' : '' }}>
                                {{ $type_title }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <button class="btn" type="submit" name="sub_form">Знайти</button>
            </form>

            @if ($cars != null && isset($cars[0]))
                <table class="all">
                    <thead>
                        <tr>
                            <th class="table-border">ID</th>
                            <th class="table-border width">Марка</th>
                            <th class="table-border">Модель</th>
                            <th class="table-border">Рік</th>
                            <th class="table-border">Колір</th>
                            <th class="table-border">Ціна</th>
                            <th class="table-border width-200 ">Компанія</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->idCar }}</td>
                                <td>{{ $car->marka }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->color }}</td>
                                <td>{{ $car->cost }} $</td>
                                <td>{{ $car->compani }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table><br>
            @else
                <div class='error-text'>Помилка: Не знайдено значень, задовольняючих критерій</div>
            @endif
        </div>

        <div class="block">
            <form method="get" action="/comp" class="modal">
                @csrf
                <label>
                    <input class="input-text" type="text" name="param_comp" class="paramclass"
                        placeholder="Значення параметру" value="{{ isset($param_comp) ? $param_comp : '' }}">
                </label>
                <label>
                    <select class="input-text" name="type_comp">
                        @foreach ($search_types_comp as $type_id => $type_title)
                            <option value="{{ $type_id }}" {{ $type_id == $type_selected_comp ? 'selected' : '' }}>
                                {{ $type_title }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <button class="btn" type="submit" name="sub_form">Знайти</button>
            </form>

            @if ($comp != null && isset($comp[0]))
                <table class="all">
                    <thead>
                        <tr>
                            <th class="table-border  ">ID</th>
                            <th class="table-border width-200 ">Компанія </th>
                            <th class="table-border width ">Рік заснування</th>
                            <th class="table-border width ">Капіталізація</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comp as $compani)
                            <tr>
                                <td>
                                    {{ $compani->idComp }}
                                </td>
                                <td>
                                    <a class="link-style link-hover " href="/compani/{{ $compani->idComp }}">
                                        {{ $compani->compani }}</a>
                                </td>

                                <td>{{ $compani->compani_year }}</td>
                                <td> € {{ $compani->capital }} млрд</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table><br>
            @else
                <div class='error-text'>Помилка: Не знайдено значень, задовольняючих критерій</div>
            @endif
        </div>

    </div>
@endsection
