@extends('admin.layout')

@section('content')
    <div class="block block-admin">
        <div>
            <h1>Компанії</h1>
            @if ($company != null && isset($company[0]))
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Компанія</th>
                            <th>Рік заснування</th>
                            <th>Капітал</th>
                            <th>Дія</th>
                            <th>Дія</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company as $comp)
                            <tr>
                                <td>{{ $comp->idComp }}</td>
                                <td>{{ $comp->compani }}</td>
                                <td>{{ $comp->compani_year }}</td>
                                <td> €{{ $comp->capital }} млрд </td>
                                <td>
                                    <a class="btn-a" href="/admin/company/{{ $comp->idComp }}/edit">Редагувати</a>

                                </td>
                                <td>
                                    <form class="form-del" action="/admin/company/{{ $comp->idComp }}"method="POST">
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
