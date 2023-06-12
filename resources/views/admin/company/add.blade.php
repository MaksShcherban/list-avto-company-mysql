@extends('admin.layout')

<style type="text/css">
    label {
        min-width: 150px;
        display: inline-block;
    }
</style>

@section('content')
    <div class="block form-edit">
        <h2 style="margin-left: 100px">Додати компанію</h2>

        <form action="/admin/company" method="POST">
            {{ csrf_field() }}
            <div class="edit-form">
                <label style="padding-top: 10px">Компанія</label>
                <input class="input-text" type="text" name="company" required>
                @error('company')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Рік заснування</label>
                <input class="input-text" type="text" name="foundation_year" required>
                @error('foundation_year')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Капітал</label>
                <input class="input-text" type="text" name="capital" required>
                @error('capital')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn one-btn center" type="submit">Зберегти</button>
        </form>
    </div>
@endsection
