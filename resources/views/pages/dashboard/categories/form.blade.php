@extends('layouts.app')

@section('page-title',  isset($category) ? 'Редактирование категории' : 'Добавление категории')

@section('content')

    <div class="container">
        <h1 class="my-md-5 my-4">
            {{ isset($category) ? 'Редактирование категории' : 'Добавить категорию' }}
        </h1>
        <div class="row">
            <div class="col-lg-5 col-md-8">
                <form method="post" action="{{ isset($category) ? route('dashboard.categories.update', $category) : route('dashboard.categories.store') }}">
                    @csrf

                    @isset($category)
                        @method('PUT')
                    @endif

                    @include('partials.flash-messages')

                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control"
                               value="{{ $category->title ?? old('title') }}"
                               placeholder="Напишите название" id="floatingName">
                        <label for="floatingName">Название</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>

                    <button class="btn @isset($category) btn-primary @else btn-success @endisset" type="submit">
                        @isset($category) Сохранить @else Добавить @endisset
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
