@extends('admin.layout')

@section('content')
    <div class="block form-edit">
        <h2 style="margin-left: 100px">Редагування автомобіля</h2>
        <form action="/admin/car/{{ $edit->idCar }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="edit-form">
                <label style="padding-top: 10px">Марка</label>
                <input class="input-text" type="text" name="marka" value="{{ $edit->marka }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Модель</label>
                <input class="input-text" type="text" name="model" value="{{ $edit->model }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Рік</label>
                <input class="input-text" type="text" name="year" value="{{ $edit->year }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Ціна</label>
                <input class="input-text" type="text" name="cost" value="{{ $edit->cost }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Колір</label>
                <input class="input-text" type="text" name="color" value="{{ $edit->color }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">№ компанії</label>
                <input class="input-text" type="text" name="compani_id" value="{{ $edit->compani_id }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn one-btn center" type="submit">Зберегти</button>
        </form>
    </div>
@endsection
