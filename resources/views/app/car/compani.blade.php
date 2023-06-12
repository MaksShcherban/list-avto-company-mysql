@extends('app.layouts.layout')


@section('page_title')
    <div class="title_comp">
        <h1>Автомобільна компанія "{{ isset($comp[0]) ? $comp[0]->compani : 'Undefined' }}"</h1>
        <h2> Рік заснування:
            {{ isset($comp[0]) ? $comp[0]->compani_year : 0 }}</h2>
        <h2> Капіталізація:
            € {{ isset($comp[0]) ? $comp[0]->capital : 0 }} млрд</h2>
    </div>
@endsection

@section('content')
    <div class="block">
        @if (isset($comp[0]))
            <table class="all ">
                <thead>
                    <tr>
                        <th class="table-border">ID</th>
                        <th class="table-border width-200">Марка</th>
                        <th class="table-border">Модель</th>
                        <th class="table-border">Рік</th>
                        <th class="table-border">Колір</th>
                        <th class="table-border">Ціна</th>

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
                        </tr>
                    @endforeach

                </tbody>
            </table><br>
        @else
            <div class='error-text'>Помилка: Автомобілів не знайдено</div>
        @endif

        <br>
        <button class="btn bottom"> <a class="link-style" href="/">Повернутися на головну</a></button>

    </div>
@endsection
