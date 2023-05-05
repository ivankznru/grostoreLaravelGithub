@extends('layouts.auth')

@section('contents')
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-12 tt-login-img"
                    data-background="{{ staticAsset('frontend/default/assets/img/banner/login-banner.jpg') }}"></div>
                <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                    <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" action="{{ route('verification.resend') }}"
                        method="POST">
                        @csrf
                        <div class="mb-7">
                            <a href="{{ route('home') }}">
                                <img src="{{ uploadedAsset(getSetting('navbar_logo')) }}" alt="logo">
                            </a>
                        </div>
                        <h2 class="mb-4 h3">Подтвердите адрес своей электронной почты
                        </h2>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                На ваш адрес электронной почты отправлена новая ссылка для подтверждения
                            </div>
                        @endif
                        <div class="mb-2">
                            Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.</div>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    Нажмите здесь, чтобы запросить еще
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
