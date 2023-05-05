@extends('backend.layouts.master')


@section('title')
    Добавить новый блог{{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Добавить блог</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.blogs.store') }}" method="POST" class="pb-650">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Название блога</label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Написать название блога" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="category_id" class="form-label">Категория</label>
                                    <select class="form-control select2" name="category_id" data-toggle="select2" required>
                                        <option value="">Выберите категорию</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Теги</label>
                                    <select class="form-control select2" name="tag_ids[]" data-toggle="select2" multiple
                                        data-placeholder="Выберите теги">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label for="video_link" class="form-label">Ссылка на видео на ютубе</label>
                                    <input type="url" name="video_link" id="video_link"
                                        placeholder="https://www.youtube.com/watch?v=d_lz4kZ3YKI" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Краткое описание</label>
                                    <textarea class="form-control" name="short_description" id="short_description" rows="4"
                                        placeholder="Написать краткое описание"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Описание</label>
                                    <textarea class="form-control editor" name="description" id="description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">Изображения</h5>
                                <div class="mb-4">
                                    <label class="form-label">Миниатюрное изображение (600x400)</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите миниатюру блога</span>
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

                                <div class="mb-4">
                                    <label class="form-label">Изображение сведений о блоге
                                        (1200x700)</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение сведений о блоге</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="banner">
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
                        <!-- image and gallery end-->

                        <!--seo meta description start-->
                        <div class="card mb-4" id="section-10">
                            <div class="card-body">
                                <h5 class="mb-4">SEO-мета-конфигурация</h5>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Мета-заголовок</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        placeholder="Написать Мета-заголовок" class="form-control">
                                    <span class="fs-sm text-muted">
                                        Установите заголовок метатега. Рекомендуется быть простым и уникальным
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description"
                                        class="form-label">Мета-описание</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                        placeholder="Написать Мета-описание"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Мета-изображение</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выбрать Мета-изображение</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="meta_image">
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

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить блог
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
                            <h5 class="mb-4">Информация о блоге</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">Изображения для блога</a>
                                    </li>
                                    <li>
                                        <a href="#section-10">Мета-параметры SEO</a>
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
