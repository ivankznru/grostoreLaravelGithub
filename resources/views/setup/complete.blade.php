@extends('layouts.setup')
@section('contents')
    <div class="container h-100 d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card shadow">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4"><i class="las la-check-circle text-primary fs-1"></i></div>
                        <div class="mb-4">
                            <h1 class="h3">Поздравления!!!</h1>
                            <p>Вы успешно завершили процесс установки.</p>
                        </div>
                        <a href="{{ env('APP_URL') }}" class="btn btn-secondary me-2">Просматривать веб-сайт</a>
                        <a href="{{ env('APP_URL') }}/admin" class="btn btn-primary">Просмотреть панель администратора</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
