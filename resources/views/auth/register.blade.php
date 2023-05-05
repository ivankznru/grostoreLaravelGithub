@extends('layouts.auth')

@section('contents')
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-12 tt-login-img"
                    data-background="{{ staticAsset('frontend/default/assets/img/banner/login-banner.jpg') }}"></div>
                <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                    <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" action="{{ route('register') }}"
                        method="POST">
                        @csrf
                        <div class="mb-7">
                            <a href="{{ route('home') }}">
                                <img src="{{ uploadedAsset(getSetting('navbar_logo')) }}" alt="logo">
                            </a>
                        </div>
                        <h2 class="mb-4 h3">Привет!
                            <br>Зарегестрироваться как покупатель
                        </h2>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <label class="fw-bold text-dark fs-sm mb-1">Полное имя<sup
                                            class="text-danger">*</sup>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Введите свое имя" class="theme-input"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <label class="fw-bold text-dark fs-sm mb-1">Email<sup
                                            class="text-danger">*</sup></label>
                                    <input type="email" id="email" name="email"
                                        placeholder="Введите свой email" class="theme-input"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field check-password">
                                    <label class="fw-bold text-dark fs-sm mb-1">Пароль<sup
                                            class="text-danger">*</sup></label>
                                    <div class="check-password">
                                        <input type="password" name="password" placeholder="Пароль"
                                            class="theme-input" required>
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-field check-password">
                                    <label class="fw-bold text-dark fs-sm mb-1">Подтвердите пароль<sup
                                            class="text-danger">*</sup></label>
                                    <div class="check-password">
                                        <input type="password" name="password_confirmation"
                                            placeholder="Подтвердите пароль" class="theme-input" required>
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-4">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary w-100">Выйти</button>
                            </div>

                            <!--social login-->
                            @include('frontend.default.inc.social')
                            <!--social login-->

                        </div>
                        <p class="mb-0 fs-xs mt-4">Уже есть учетная запись? <a
                                href="{{ route('login') }}">Войти</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
