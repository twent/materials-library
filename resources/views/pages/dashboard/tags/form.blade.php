@extends('layouts.app')

@section('page-title',  isset($tag) ? 'Редактирование тега' : 'Добавление тега')

@section('page-title')
    Теги
@endsection

@section('content')

    <div class="container">
        <h1 class="my-md-5 my-4">{{ isset($tag) ? 'Редактирование тега' : 'Добавить тег' }}</h1>
        <div class="row">
            <div class="col-lg-5 col-md-8">
                <form method="post" action="{{ isset($tag) ? route('dashboard.tags.update', $tag) : route('dashboard.tags.store') }}">
                    @csrf

                    @isset($tag)
                        @method('PUT')
                    @endif

                    @include('partials.flash-messages')

                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control"
                               value="{{ $tag->title ?? old('title') }}"
                               placeholder="Напишите название" id="floatingName">
                        <label for="floatingName">Название</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>

                    <button class="btn @isset($tag) btn-primary @else btn-success @endisset" type="submit">
                        @isset($tag) Сохранить @else Добавить @endisset
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
