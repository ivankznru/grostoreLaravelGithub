@extends('backend.layouts.master')

@section('title')
    Обновить страницу {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto flex-grow-1">
                                    <div class="tt-page-title">
                                        <h2 class="h5 mb-0">Обновить страницу <sup
                                                class="badge bg-soft-warning px-2">{{ $lang_key }}</sup></h2>
                                    </div>
                                </div>
                                <div class="col-4 col-md-2">
                                    <select id="language" class="w-100 form-control text-capitalize country-flag-select"
                                        data-toggle="select2" onchange="localizeData(this.value)">
                                        @foreach (\App\Models\Language::all() as $key => $language)
                                            <option value="{{ $language->code }}"
                                                {{ $lang_key == $language->code ? 'selected' : '' }}
                                                data-flag="{{ staticAsset('backend/assets/img/flags/' . $language->flag . '.png') }}">
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.pages.update') }}" method="POST" class="pb-650">
                        @csrf
                        <input type="hidden" name="id" value="{{ $page->id }}">
                        <input type="hidden" name="lang_key" value="{{ $lang_key }}">
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="title" class="form-label">Заголовок страницы</label>
                                    <input class="form-control" type="text" id="title"
                                        placeholder="Введите заголовок страницы" name="title" required
                                        value="{{ $page->collectLocalization('title', $lang_key) }}">
                                </div>


                                @if (env('DEFAULT_LANGUAGE') == $lang_key)
                                    <div class="mb-4">
                                        <label for="slug" class="form-label">Слаг страницы</label>
                                        <input class="form-control" type="text" id="slug"
                                            placeholder="Введите слаг страницы" name="titslugle" required
                                            value="{{ $page->slug }}">
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <label for="content" class="form-label">Описание страницы</label>
                                    <textarea class="form-control editor" id="content" name="content">{{ $page->collectLocalization('content', $lang_key) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        @if (env('DEFAULT_LANGUAGE') == $lang_key)
                            <!--seo meta description start-->
                            <div class="card mb-4" id="section-2">
                                <div class="card-body">
                                    <h5 class="mb-4">SEO-мета-конфигурация</h5>

                                    <div class="mb-4">
                                        <label for="meta_title" class="form-label">Мета-заголовок</label>
                                        <input type="text" name="meta_title" id="meta_title"
                                            placeholder="Введите мета-заголовок" class="form-control"
                                            value="{{ $page->meta_title }}">
                                        <span class="fs-sm text-muted">
                                            Установите заголовок метатега. Рекомендуется быть простым и уникальным
                                        </span>
                                    </div>

                                    <div class="mb-4">
                                        <label for="meta_description"
                                            class="form-label">Мета-описание</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                            placeholder="Введите мета-описание">{{ $page->meta_description }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Мета-изображение</label>
                                        <div class="tt-image-drop rounded">
                                            <span class="fw-semibold">Выберите мета-изображение</span>
                                            <!-- choose media -->
                                            <div class="tt-product-thumb show-selected-files mt-3">
                                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                    onclick="showMediaManager(this)" data-selection="single">
                                                    <input type="hidden" name="meta_image"
                                                        value="{{ $page->meta_image }}">
                                                    <div class="no-avatar rounded-circle">
                                                        <span><i data-feather="plus"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- choose media -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--seo meta description end-->
                        @endif

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить изменения
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
                            <h5 class="mb-4">Информация о странице</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>

                                    @if (env('DEFAULT_LANGUAGE') == $lang_key)
                                        <li>
                                            <a href="#section-2" class="">Мета-параметры SEO</a>
                                        </li>
                                    @endif
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
