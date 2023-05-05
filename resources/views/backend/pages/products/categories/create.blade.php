@extends('backend.layouts.master')

@section('title')
    Добавить новую категорию {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Добавить новую категорию</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.categories.store') }}" method="POST" class="pb-650">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя категории</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите имя категории" name="name" required>
                                </div>

                                <div class="mb-4">
                                    <label for="parent_id" class="form-label">Базовая категория</label>
                                    <select class="form-control select2" name="parent_id" class="w-100"
                                        data-toggle="select2">
                                        <option value="0">᎗</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->collectLocalization('name') }}</option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('backend.pages.products.categories.subCategory', [
                                                    'subCategory' => $childCategory,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Бренды</label>
                                    <select class="form-control select2" name="brand_ids[]" class="w-100"
                                        data-toggle="select2" data-placeholder="Выберите бренд" multiple>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->collectLocalization('name') }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="sorting_order_level"
                                        class="form-label">Номер приоритета сортировки</label>
                                    <input class="form-control" type="number" id="sorting_order_level"
                                        placeholder="Введите номер приоритета сортировки"
                                        name="sorting_order_level">
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!--product image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">Изображения</h5>
                                <div class="mb-4">
                                    <label class="form-label">Миниатюра</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите миниатюру категории</span>
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
                        <!--product image and gallery end-->

                        <!--seo meta description start-->
                        <div class="card mb-4" id="section-10">
                            <div class="card-body">
                                <h5 class="mb-4">SEO-мета-конфигурация</h5>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Мета-заголовок</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        placeholder="Введите мета-заголовок" class="form-control">
                                    <span class="fs-sm text-muted">
                                       Установите заголовок метатега. Рекомендуется быть простым и уникальным
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description"
                                        class="form-label">Мета-описание</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                        placeholder="Введите мета-описание"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Мета-изображени</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите мета-изображение</span>
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
                                        <i data-feather="save" class="me-1"></i>Сохранить категорию
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
                            <h5 class="mb-4">Информация о категории</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">Изображение категории</a>
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
