@extends('backend.layouts.master')

@section('title')
    Настройка домашней страницы веб-сайта {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Второй раздел баннера</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="banner_section_two_banner_one_link"
                                        class="form-label">Баннерная ссылка 1</label>
                                    <input type="hidden" name="types[]" value="banner_section_two_banner_one_link">
                                    <input type="url" name="banner_section_two_banner_one_link"
                                        id="banner_section_two_banner_one_link"
                                        placeholder="{{ env('APP_URL') . '/example' }}" class="form-control"
                                        value="{{ getSetting('banner_section_two_banner_one_link') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Изображение баннера 1</label>
                                    <input type="hidden" name="types[]" value="banner_section_two_banner_one">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение баннера</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="banner_section_two_banner_one"
                                                    value="{{ getSetting('banner_section_two_banner_one') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="banner_section_two_banner_two_link"
                                        class="form-label">Баннер Ссылка 2</label>
                                    <input type="hidden" name="types[]" value="banner_section_two_banner_two_link">
                                    <input type="url" name="banner_section_two_banner_two_link"
                                        id="banner_section_two_banner_two_link"
                                        placeholder="{{ env('APP_URL') . '/example' }}" class="form-control"
                                        value="{{ getSetting('banner_section_two_banner_two_link') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Изображение баннера 2</label>
                                    <input type="hidden" name="types[]" value="banner_section_two_banner_two">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение баннера</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="banner_section_two_banner_two"
                                                    value="{{ getSetting('banner_section_two_banner_two') }}">
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
                        <!--slider info end-->


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-3">Домашняя страница установка</h5>
                            <div class="tt-vertical-step-link">
                                <ul class="list-unstyled">
                                    @include('backend.pages.appearance.homepage.inc.rightSidebar')
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
