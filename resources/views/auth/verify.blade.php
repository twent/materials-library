@extends('layouts.app')

@section('page-title', 'Подтверждение учётной записи')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите Ваш Email адрес</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Ссылка подтверждения была отправлена на Ваш email.') }}
                        </div>
                    @endif

                    Перед продолжением проверьте Вашу почту.

                    Если Вы не получили ссылку, то
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"> нажмите здесь для получения новой ссылки</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
