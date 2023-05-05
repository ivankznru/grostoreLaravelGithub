@extends('backend.layouts.master')

@section('title')
    Обновить профиль {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Обновить профиль</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Имя</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите ваше имя" name="name" required
                                        value="{{ $user->name }}">
                                </div>


                                <div class="mb-3">
                                    <label for="email" class="form-label">Эл.почта</label>
                                    <input class="form-control" type="email" id="email"
                                        placeholder="Введите эл.почту" name="email" required
                                        value="{{ $user->email }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Телефон</label>
                                    <input class="form-control" type="text" id="phone"
                                        placeholder="Введите телефон"
                                        name="phone"value="{{ $user->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Аватар</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите Аватар</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="avatar" value="{{ $user->avatar }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input class="form-control" type="password" id="password"
                                        placeholder="Введите пароль" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation"
                                        class="form-label">Подтвердить пароль</label>
                                    <input class="form-control" type="password" id="password_confirmation"
                                        placeholder="Введите пароль еще раз" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i>Сохранить изменения
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">Информация о пользователе</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
@endsection
