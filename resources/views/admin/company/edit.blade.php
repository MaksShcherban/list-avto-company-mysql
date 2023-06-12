@extends('admin.layout')

@section('content')
    <div class="block form-edit">
        <h2 style="margin-left: 100px">Редагування компанії</h2>
        <form action="/admin/company/{{ $edit_comp->comp_id }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="edit-form">
                <label style="padding-top: 10px">Компанія</label>
                <input class="input-text" type="text" name="company" value="{{ $edit_comp->name }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Рік заснування</label>
                <input class="input-text" type="text" name="compani_year" value="{{ $edit_comp->foundation_year }}"
                    required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="edit-form">
                <label style="padding-top: 10px">Капіталізація</label>
                <input class="input-text" type="text" name="capital" value="{{ $edit_comp->capitalizachion }}" required>
                @error('marka')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>



            <button class="btn one-btn center" type="submit">Зберегти</button>
        </form>
    </div>
@endsection
