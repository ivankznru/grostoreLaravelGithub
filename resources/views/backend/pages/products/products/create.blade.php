@extends('backend.layouts.master')

@section('title')
    Добавить продукт {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Добавить продукт</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.products.store') }}" method="POST" class="pb-650" id="product-form">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имяродукта</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите имя продукта" name="name" required>
                                    <span class="fs-sm text-muted">
                                       Название продукта обязательно и рекомендуется, чтобы оно было уникальным.
                                    </span>
                                </div>
                                <div class="mb-4">
                                    <label for="short_description"
                                        class="form-label">Краткое описание</label>
                                    <textarea class="form-control" id="short_description"
                                        placeholder="Введите краткое описание продукта" rows="5" name="short_description"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea id="description" class="editor" name="description"></textarea>
                                </div>

                            </div>
                        </div>
                        <!--basic information end-->

                        <!--product image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">Изображения</h5>
                                <div class="mb-4">
                                    <label class="form-label">Миниатюра (592x592)</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите миниатюру для продукта</span>
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
                                    <label class="form-label">Галерея</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображения для галереи</span>

                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="multiple">
                                                <input type="hidden" name="images">
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

                        <!--product category start-->
                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4">Категории продукта</h5>
                                <div class="mb-4">
                                    <select class="select2 form-control" multiple="multiple"
                                        data-placeholder="Выберите категории" name="category_ids[]"
                                        required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->collectLocalization('name') }}</option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('backend.pages.products.products.subCategory', [
                                                    'subCategory' => $childCategory,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--product category end-->

                        <!--product tags start-->
                        <div class="card mb-4" id="section-tags">
                            <div class="card-body">
                                <h5 class="mb-4">Теги продукта</h5>
                                <div class="mb-4">
                                    <select class="form-control select2" name="tag_ids[]" data-toggle="select2" multiple
                                        data-placeholder="Выберите теги...">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--product tags end-->

                        <!--product brand and unit start-->
                        <div class="row" id="section-4">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Бренд продукта</h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="selectBrand" name="brand_id">
                                                <option value="">Выберите бренд</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">
                                                        {{ $brand->collectLocalization('name') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Единица продукта</h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="selectUnit" name="unit_id">
                                                <option value="">Выберите единицу</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">
                                                        {{ $unit->collectLocalization('name') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product brand and unit end-->

                        <!--product price sku and stock start-->
                        <div class="card mb-4" id="section-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Цена, артикул и склад</h5>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label fw-medium text-primary"
                                            for="is_variant">Имеет вариации?</label>
                                        <input type="checkbox" class="form-check-input" id="is_variant"
                                            onchange="isVariantProduct(this)" name="is_variant">
                                    </div>
                                </div>

                                <!-- without variation start-->
                                <div class="noVariation">
                                    <div class="row g-3">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Цена</label>
                                                <input type="number" min="0" step="0.0001" id="price"
                                                    name="price" placeholder="Цена продукта"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="stock" class="form-label">Склад <small
                                                        class="text-warning">Местоположение по умолчанию</small></label>
                                                <input type="number" id="stock"
                                                    placeholder="Количество на складе" name="stock"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="sku" class="form-label">Артикул</label>
                                                <input type="text" id="sku"
                                                    placeholder="Артикуль продукта" name="sku"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="code" class="form-label">Код</label>
                                                <input type="text" id="code"
                                                    placeholder="Код продукта" name="code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- without variation start end-->


                                <!--for variation row start-->
                                <div class="hasVariation" style="display: none">
                                    @php
                                        $sizes = \App\Models\VariationValue::isActive()
                                            ->where('variation_id', 1)
                                            ->get();

                                        $colors = \App\Models\VariationValue::isActive()
                                            ->where('variation_id', 2)
                                            ->get();
                                    @endphp

                                    <div class="row g-3">
                                        <!-- size -->
                                        @if (count($sizes) > 0)
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label for="product-thumb"
                                                        class="form-label">Города</label>
                                                    <input type="hidden" name="chosen_variations[]" value="1">
                                                    <select class="select2 form-control" multiple="multiple"
                                                        data-placeholder="Выберите город"
                                                        onchange="generateVariationCombinations()"
                                                        name="option_1_choices[]">
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}">
                                                                {{ $size->collectLocalization('name') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- size end -->

                                        <!-- colors -->
                                        @if (count($colors) > 0)
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label for="product-thumb"
                                                        class="form-label">Цвета</label>
                                                    <input type="hidden" name="chosen_variations[]" value="2">
                                                    <select class="select2 form-control" multiple="multiple"
                                                        data-placeholder="Выберите цвета"
                                                        onchange="generateVariationCombinations()"
                                                        name="option_2_choices[]">
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}">
                                                                {{ $color->collectLocalization('name') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- colors end -->
                                    </div>

                                    @if (count($variations) > 0)
                                        <div class="row g-3 mt-1">
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label">Выберите варианты</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label">Выберите значения</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chosen_variation_options">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <div class="mb-0">
                                                        <select class="form-select select2"
                                                            onchange="getVariationValues(this)"
                                                            name="chosen_variations[]">
                                                            <option value="">Выберите вариант
                                                            </option>
                                                            @foreach ($variations as $key => $variation)
                                                                <option value="{{ $variation->id }}">
                                                                    {{ $variation->collectLocalization('name') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-0">
                                                        <div class="variationvalues">
                                                            <input type="text" class="form-control"
                                                                placeholder="Выберите значения вариантов" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <button class="btn btn-link px-0 fw-medium fs-base" type="button"
                                                        onclick="addAnotherVariation()">
                                                        <i data-feather="plus" class="me-1"></i>
                                                        Добавить еще одну вариацию
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="variation_combination" id="variation_combination">
                                        {{-- combinations will be added here via ajax response --}}
                                    </div>

                                    <!-- size guide -->
                                    <div class="mt-3">
                                        <label class="form-label">Руководство по размеру продукта</label>
                                        <div class="tt-image-drop rounded">
                                            <span class="fw-semibold">Выберите изображение руководства по размеру</span>
                                            <!-- choose media -->
                                            <div class="tt-product-thumb show-selected-files mt-3">
                                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                    onclick="showMediaManager(this)" data-selection="single">
                                                    <input type="hidden" name="size_guide">
                                                    <div class="no-avatar rounded-circle">
                                                        <span><i data-feather="plus"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- choose media -->
                                        </div>
                                    </div>
                                    <!-- size guide end -->
                                </div>
                            </div>
                            <!--for variation row end-->
                        </div>
                        <!--product price sku and stock end-->

                        <!--product discount start-->
                        <div class="card mb-4" id="section-6">
                            <div class="card-body">
                                <h5 class="mb-4">Скидка на продукт</h5>

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Диапазон дат</label>
                                            <div class="input-group">
                                                <input class="form-control date-range-picker date-range" type="text"
                                                    placeholder="Дата начала - Дата окончания"
                                                    name="date_range">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="discount_value"
                                                class="form-label">Сумма скидки</label>
                                            <input class="form-control" type="number"
                                                placeholder="Введите сумму скидки" id="discount_value"
                                                value="0" step="0.001" name="discount_value">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="discount_type"
                                                class="form-label">Процент или фиксированный</label>
                                            <select class="select2 form-control" id="discount_type" name="discount_type">
                                                <option value="percent">Процент %</option>
                                                <option value="flat">Фиксированный</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product discount end-->

                        <!--shipping configuration start-->
                        <div class="card mb-4 d-none" id="section-7">
                            <div class="card-body">
                                <h5 class="mb-4">Конфигурация доставки</h5>

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="mb-0">
                                            <label for="min_purchase_qty"
                                                class="form-label">Минимальное количество покупки</label>
                                            <input type="number" id="min_purchase_qty" name="min_purchase_qty"
                                                min="1" value="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-0">
                                            <label for="max_purchase_qty"
                                                class="form-label">Максимальное количество покупки</label>
                                            <input type="number" id="max_purchase_qty" name="max_purchase_qty"
                                                min="1" value="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="mb-0">
                                            <label for="standard_delivery_hours"
                                                class="form-label">Стандартное время доставки</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control"
                                                    name="standard_delivery_hours" value="72" min="0" required
                                                    id="standard_delivery_hours">
                                                <div class="input-group-append"><span
                                                        class="input-group-text">hr(s)</span></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="mb-0">
                                            <label for="express_delivery_hours"
                                                class="form-label">Срок экспресс-доставки</label>
                                            <div class="input-group">
                                                <input type="number" step="0.01" class="form-control"
                                                    name="express_delivery_hours" value="24" min="0" required
                                                    id="express_delivery_hours">
                                                <div class="input-group-append"><span
                                                        class="input-group-text">hr(s)</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--shipping configuration end-->

                        <!--product tax start-->
                        <div class="card mb-4" id="section-8">
                            <div class="card-body">
                                <h5 class="mb-4">Налоги на товары по умолчанию 0%</h5>
                                <div class="row g-3">
                                    @foreach ($taxes as $tax)
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label class="form-label">{{ $tax->name }}</label>
                                                <input type="hidden" value="{{ $tax->id }}" name="tax_ids[]">
                                                <input type="number" lang="en" min="0" value="0"
                                                    step="0.01" placeholder="Налог" name="taxes[]"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label class="form-label">Процент или фиксированный</label>
                                                <select class="select2 form-control" name="tax_types[]">
                                                    <option value="percent">Процент % </option>
                                                    <option value="flat">Фиксированный</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--product tax end-->

                        <!--product sell target & status start-->
                        <div class="row g-3" id="section-9">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Продать цель</h5>
                                        <div class="tt-select-brand">
                                            <input type="number" min="0" name="sell_target" class="form-control"
                                                placeholder="Введите цель продажи">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Статус продукта</h5>
                                        <div class="tt-select-brand">
                                            <select class="select2 form-control" id="is_published" name="is_published">
                                                <option value="1">Опубликован</option>
                                                <option value="0">Неопубликован</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product sell target & status end-->

                        <!--seo meta description start-->
                        <div class="card mb-4" id="section-10">
                            <div class="card-body">
                                <h5 class="mb-4">SEO-мета-конфигурация</h5>

                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Мета-заголовок</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        placeholder="Введите мета-заголовок" class="form-control">
                                    <span class="fs-sm text-muted">
                                       Установите заголовок метатега. Рекомендуется быть простым и уникальным.
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="meta_description"
                                        class="form-label">Мета-описание</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                        placeholder="Введите мета-описание"></textarea>
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
                                        <i data-feather="save" class="me-1"></i>Сохранить продукт
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">Информация о товаре</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">Изображения продукта</a>
                                    </li>
                                    <li>
                                        <a href="#section-3">Категория</a>
                                    </li>
                                    <li>
                                        <a href="#section-tags">Теги продукта</a>
                                    </li>
                                    <li>
                                        <a href="#section-4">Марка продукта и единица измерения</a>
                                    </li>
                                    <li>
                                        <a href="#section-5">Цена, артикул, склад и варианты</a>
                                    </li>
                                    <li>
                                        <a href="#section-7">Конфигурация доставки</a>
                                    </li>
                                    <li>
                                        <a href="#section-8">Налоги на товары</a>
                                    </li>

                                    <li>
                                        <a href="#section-9">Цель продажи и статус</a>
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

@section('scripts')
    @include('backend.inc.product-scripts')
@endsection
