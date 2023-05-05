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
                                <h2 class="h5 mb-lg-0">Настройка раздела героев</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4" id="section-1">
                                <table class="table tt-footable" data-use-parent-width="true">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="7%">С/Л</th>
                                            <th>Изображение</th>
                                            <th>Подзаголовок</th>
                                            <th data-breakpoints="xs sm">Заголовок</th>
                                            <th data-breakpoints="xs sm md lg xl">Текст</th>
                                            <th data-breakpoints="xs sm" class="text-end">
                                               Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($sliders as $key => $slider)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="align-middle">
                                                    <div class="avatar avatar-lg">
                                                        <img class="rounded" src="{{ uploadedAsset($slider->image) }}"
                                                            alt="" />
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="fs-sm mb-0">
                                                        {{ $slider->sub_title }}</h6>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="fs-sm mb-0">
                                                        {{ $slider->title }}</h6>
                                                </td>

                                                <td class="align-middle">
                                                    {{ $slider->text }}
                                                </td>

                                                <td class="text-end align-middle">
                                                    <div class="dropdown tt-tb-dropdown">
                                                        <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end shadow">

                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.appearance.homepage.editHero', ['id' => $slider->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i>Редактировать
                                                            </a>

                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="{{ route('admin.appearance.homepage.deleteHero', $slider->id) }}"
                                                                title="Удалить">
                                                                <i data-feather="trash-2" class="me-2"></i>
                                                                Удалить
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.appearance.homepage.storeHero') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4">Добавить новый слайдер</h5>

                                <div class="mb-4">
                                    <label for="sub_title" class="form-label">Подзаголовок</label>
                                    <input type="text" name="sub_title" id="sub_title"
                                        placeholder="Написать подзаголовок" class="form-control" required>
                                </div>


                                <div class="mb-4">
                                    <label for="title" class="form-label">Заголовок</label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Написать заголовок" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="text" class="form-label">Текст</label>
                                    <input type="text" name="text" id="text"
                                        placeholder="Написать текст" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="link" class="form-label">Ссылка</label>
                                    <input type="url" name="link" id="link"
                                        placeholder="{{ env('APP_URL') }}/example" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Слайдер изображений</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение слайдера</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image">
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
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить слайдер
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
                            <h5 class="mb-4">Домашняя страница установка</h5>
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
