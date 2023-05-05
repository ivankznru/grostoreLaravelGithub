@extends('layouts.setup')
@section('contents')
    <div class="container h-100 d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="h3">Установка</h1>
                        <p class="mb-0">Вам необходимо ознакомиться с указанной информацией, прежде чем продолжить.</p>
                    </div>
                    <div class="card-body pb-4">
                        <ol class="list-group list-group-flush">
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>Имя базы данных</span>
                                <i class="las la-check-circle fs-4 text-primary"></i>
                            </li>
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">

                                <span>Имя пользователя базы данных</span>
                                <i class="las la-check-circle fs-4 text-primary"></i>
                            </li>
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">

                                <span>Пароль базы данных</span>
                                <i class="las la-check-circle fs-4 text-primary"></i>

                            </li>
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>Имя хоста базы данных</span>
                                <i class="las la-check-circle fs-4 text-primary"></i>

                            </li>
                        </ol>
                        <br>
                        <a href="{{ route('installation.checklist') }}" class="btn btn-primary">
                            Переходите к следующему <i class="las la-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
