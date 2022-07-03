@extends('layouts.app')

@section('page-title',  isset($material) ? 'Редактирование материала' : 'Добавление материала')

@section('content')

    <div class="container">
        <h1 class="my-md-5 my-4">{{ isset($material) ? 'Редактирование материала' : 'Добавить материал' }}</h1>
        <div class="row">
            <div class="col-lg-5 col-md-8">
                <form method="post" action="{{ isset($material) ? route('dashboard.materials.update', $material) : route('dashboard.materials.store') }}">
                    @csrf

                    @isset($material)
                        @method('PUT')
                    @endif

                    @include('partials.flash-messages')

                    <div class="form-floating mb-3">
                        <select name="type" class="form-select" id="floatingSelectType" required>
                            <option value="0" @isset($material) @else selected @endisset>Выберите тип</option>
                            @foreach($types as $k => $value)
                                <option value="{{ strtolower($k) }}"
                                        @if ((isset($material) && $material->type === $k) || old('type') == strtolower($k))
                                            selected
                                        @endif
                                >{{ $value }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelectType">Тип</label>
                        <div class="invalid-feedback">
                            Пожалуйста, выберите значение
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="category_id"  class="form-select" id="floatingSelectCategory" required>
                            <option value="0" @isset($material) @else selected @endisset>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if((isset($material) && $material->category_id === $category->id) || old('category_id') == $category->id)
                                            selected
                                        @endif
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelectCategory">Категория</label>
                        <div class="invalid-feedback">
                            Пожалуйста, выберите значение
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control"
                               value="{{ $material->title ?? old('title') }}"
                               placeholder="Напишите название" id="floatingName" required>
                        <label for="floatingName">Название</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="authors"  type="text" class="form-control"
                               value="{{ $material->authors ?? old('authors') }}"
                               placeholder="Напишите авторов" id="floatingAuthor">
                        <label for="floatingAuthor">Авторы</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                    <textarea name="description"  class="form-control" placeholder="Напишите краткое описание" id="floatingDescription"
                              style="height: 100px">{{ $material->description ?? old('description') }}</textarea>
                        <label for="floatingDescription">Описание</label>
                        <div class="invalid-feedback">
                            Пожалуйста, заполните поле
                        </div>
                    </div>
                    <button class="btn @isset($material) btn-primary @else btn-success @endisset" type="submit">
                        @isset($material) Сохранить @else Добавить @endisset
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
