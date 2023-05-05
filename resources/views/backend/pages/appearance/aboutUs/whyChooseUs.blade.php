@extends('backend.layouts.master')

@section('title')
    О нас Конфигурация {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Почему выбирают нас Раздел</h2>
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
                        <!--about intro info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4">Общая информация</h5>

                                <div class="mb-3">
                                    <label for="about_why_choose_sub_title"
                                        class="form-label">Подзогаловок</label>
                                    <input type="hidden" name="types[]" value="about_why_choose_sub_title">
                                    <input type="text" name="about_why_choose_sub_title" id="about_why_choose_sub_title"
                                        placeholder="Введите подзоголовок" class="form-control"
                                        value="{{ getSetting('about_why_choose_sub_title') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="about_why_choose_title" class="form-label">Заголовок</label>
                                    <input type="hidden" name="types[]" value="about_why_choose_title">
                                    <input type="text" name="about_why_choose_title" id="about_why_choose_title"
                                        placeholder="Ввести заголовок" class="form-control"
                                        value="{{ getSetting('about_why_choose_title') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="about_why_choose_text" class="form-label">Текст</label>
                                    <input type="hidden" name="types[]" value="about_why_choose_text">
                                    <input type="text" name="about_why_choose_text" id="about_why_choose_text"
                                        placeholder="Введите текст" class="form-control"
                                        value="{{ getSetting('about_why_choose_text') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Изображение</label>
                                    <input type="hidden" name="types[]" value="about_why_choose_banner">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение баннера</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="about_why_choose_banner"
                                                    value="{{ getSetting('about_why_choose_banner') }}">
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
                        <!--about intro info end-->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i>Сохранить изменения
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- features -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Функции</h5>
                            <table class="table tt-footable" data-use-parent-width="true">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="7%">С/Л</th>
                                        <th>Иконка</th>
                                        <th data-breakpoints="xs sm">Заголовок</th>
                                        <th data-breakpoints="xs sm md lg">Текст</th>
                                        <th data-breakpoints="xs sm" class="text-end">
                                            Действие
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($why_choose_us as $key => $each_why_choose_us)
                                        <tr>
                                            <td class="text-center align-middle">
                                                {{ $key + 1 }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="avatar avatar-md">
                                                    <img class="rounded"
                                                        src="{{ uploadedAsset($each_why_choose_us->image) }}"
                                                        alt="" />
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <h6 class="fs-sm mb-0">
                                                    {{ $each_why_choose_us->title }}</h6>
                                            </td>

                                            <td class="align-middle">
                                                {{ $each_why_choose_us->text }}
                                            </td>

                                            <td class="text-end align-middle">
                                                <div class="dropdown tt-tb-dropdown">
                                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end shadow">

                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.appearance.about-us.editWhyChooseUs', ['id' => $each_why_choose_us->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                            <i data-feather="edit-3"
                                                                class="me-2"></i>Изменить
                                                        </a>

                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="{{ route('admin.appearance.about-us.deleteWhyChooseUs', $each_why_choose_us->id) }}"
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
                    <!-- features -->


                    <!-- add features -->
                    <form action="{{ route('admin.appearance.about-us.storeWhyChooseUs') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4">Добавить новый виджет</h5>

                                <div class="mb-4">
                                    <label for="title" class="form-label">Заголовок</label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Ввести заголовок" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="text" class="form-label">Текст</label>
                                    <textarea name="text" id="text" placeholder="Ввести текст" class="form-control" required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Изображение иконки</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выбрать изображение иконки</span>
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
                                        <i data-feather="save" class="me-1"></i>Сохранить виджет
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- add features -->

                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">О нас Конфигурация</h5>
                            <div class="tt-vertical-step-link">
                                <ul class="list-unstyled">
                                    @include('backend.pages.appearance.aboutUs.inc.rightSidebar')
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
