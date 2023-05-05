@extends('backend.layouts.master')

@section('title')
    Добавте новый купон {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Добавит купон</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.coupons.store') }}" method="POST" class="pb-650">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="code" class="form-label">Код купона</label>
                                    <input class="form-control" type="text" id="code"
                                        placeholder="Напишите код купона" name="code" required>
                                </div>

                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="discount_value"
                                                    class="form-label">Сумма скидки</label>
                                                <input class="form-control" type="number"
                                                    placeholder="Напишите сумму скидки" id="discount_value"
                                                    value="0" step="0.001" name="discount_value" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="discount_type"
                                                    class="form-label">Процент или фиксированный</label>
                                                <select class="select2 form-control" id="discount_type" name="discount_type"
                                                    required>
                                                    <option value="percent">Процент % </option>
                                                    <option value="flat">Фиксированный</option>
                                                </select>
                                            </div>
                                        </div>

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

                                        <div class="col-lg-6">
                                            <label for="discount_value"
                                                class="form-label mb-3">Бесплатная доставка?</label>
                                            <div class="d-flex align-items-center">
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label fw-semibold text-primary"
                                                        for="is_free_shipping">Разрешить бесплатную доставку?</label>
                                                    <input type="checkbox" class="form-check-input" id="is_free_shipping"
                                                        name="is_free_shipping">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Баннер</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите баннер с купоном</span>
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
                        <!--basic information end-->


                        <!-- products & categories -->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="">Товары и категории</h5>
                                <div class="mb-4"><small
                                        class="text-warning">Купон будет применяться только к продуктам, категориям, если они выбраны</small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Категории</label>
                                    <select class="form-control select2" class="w-100" data-toggle="select2"
                                        data-placeholder="Выбрать категории" name="category_ids[]"
                                        multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('backend.pages.products.products.subCategory', [
                                                    'subCategory' => $childCategory,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label class="form-label">Продукты</label>
                                    <select class="form-control select2" class="w-100" data-toggle="select2"
                                        data-placeholder="Выбрать продукты" name="product_ids[]"
                                        multiple>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!-- products & categories -->



                        <!-- configurations -->
                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4">Конфигурации купонов</h5>
                                <div class="mb-4">
                                    <label class="form-label">Минимальные расходы</label>
                                    <input type="number" min="0" step="0.001" class="form-control"
                                        id="min_spend" name="min_spend" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Максимальная сумма скидки</label>
                                    <input type="number" min="0" step="0.001" class="form-control"
                                        id="max_discount_amount" name="max_discount_amount" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Общий лимит использования</label>
                                    <input type="number" min="1" class="form-control" id="total_usage_limit"
                                        name="total_usage_limit" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Лимит использования на клиента</label>
                                    <input type="number" min="1" class="form-control" id="customer_usage_limit"
                                        name="customer_usage_limit" required>
                                </div>


                            </div>
                        </div>
                        <!-- configurations -->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить купон
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
                            <h5 class="mb-4">{{ localize('Coupon Information') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Информация о купоне</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">Товары и категории</a>
                                    </li>
                                    <li>
                                        <a href="#section-3">Конфигурация купона</a>
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
