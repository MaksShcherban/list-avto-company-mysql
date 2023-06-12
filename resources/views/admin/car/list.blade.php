@extends('admin.layout')

@section('content')
    <div class="block block-admin">
        <h1>Автомобілі</h1>
        <div>
            @if ($cars != null && isset($cars[0]))
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Марка</th>
                            <th>Модель</th>
                            <th>Рік</th>
                            <th>Колір</th>
                            <th>Ціна, $</th>
                            <th>Компанія</th>
                            <th>Дія</th>
                            <th>Дія</th>

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
                                <td>
                                    <a class="btn-a" href="/admin/car/{{ $car->idCar }}/edit">Редагувати</a>

                                </td>
                                <td>
                                    <form class="form-del" action="/admin/car/{{ $car->idCar }}"method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn-a">Видалити</button>
                                    </form>
                                </td>
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
