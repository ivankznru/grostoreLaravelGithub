@extends('backend.layouts.master')


@section('title')
    Обновить продукт {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
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
                                        <h2 class="h5 mb-0"> Обновить продукт <sup
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
                    <form action="{{ route('admin.products.update') }}" method="POST" class="pb-650" id="product-form">
                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="lang_key" value="{{ $lang_key }}">

                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя продукта</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите имя продукта" name="name"
                                        value="{{ $product->collectLocalization('name', $lang_key) }}" required>
                                    <span class="fs-sm text-muted">
                                     Название продукта обязательно и рекомендуется, чтобы оно было уникальным
                                    </span>
                                </div>

                                @if (env('DEFAULT_LANGUAGE') == $lang_key)
                                    <div class="mb-4">
                                        <label for="slug" class="form-label">Слаг продукта</label>
                                        <input class="form-control" type="text" id="slug"
                                            placeholder="Введите имя продукта" name="slug"
                                            value="{{ $product->slug }}" required>
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <label for="short_description"
                                        class="form-label">Кроткое описание</label>
                                    <textarea class="form-control" id="short_description"
                                        placeholder="Введите краткое описание вашего продукта" rows="5" name="short_description">{{ $product->collectLocalization('short_description', $lang_key) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea id="description" class="editor" name="description">{{ $product->collectLocalization('description', $lang_key) }}</textarea>
                                </div>

                            </div>
                        </div>
                        <!--basic information end-->

                        @if (env('DEFAULT_LANGUAGE') == $lang_key)
                            <!--product image and gallery start-->
                            <div class="card mb-4" id="section-2">
                                <div class="card-body">
                                    <h5 class="mb-4">Изображения</h5>
                                    <div class="mb-4">
                                        <label class="form-label">Миниатюра</label>
                                        <div class="tt-image-drop rounded">
                                            <span class="fw-semibold">Выберите миниатюру продукта</span>
                                            <!-- choose media -->
                                            <div class="tt-product-thumb show-selected-files mt-3">
                                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                    onclick="showMediaManager(this)" data-selection="single">
                                                    <input type="hidden" name="image"
                                                        value="{{ $product->thumbnail_image }}">
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
                                            <span class="fw-semibold">Выберите изображения из галереи</span>

                                            <!-- choose media -->
                                            <div class="tt-product-thumb show-selected-files mt-3">
                                                <div class="avatar avatar-xl cursor-pointer choose-media"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                    onclick="showMediaManager(this)" data-selection="multiple">
                                                    <input type="hidden" name="images"
                                                        value="{{ $product->gallery_images }}">
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
                                        @php
                                            $product_categories = $product->categories()->pluck('category_id');
                                        @endphp
                                        <select class="select2 form-control" multiple="multiple"
                                            data-placeholder="Выберите категории" name="category_ids[]"
                                            required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product_categories->contains($category->id) ? 'selected' : '' }}>
                                                    {{ $category->collectLocalization('name') }}</option>
                                                @foreach ($category->childrenCategories as $childCategory)
                                                    @include(
                                                        'backend.pages.products.products.subCategory',
                                                        [
                                                            'subCategory' => $childCategory,
                                                            'product_categories' => $product_categories,
                                                        ]
                                                    )
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--product category end-->

                            <!--product tag start-->
                            <div class="card mb-4" id="section-tags">
                                <div class="card-body">
                                    <h5 class="mb-4">Теги продукта</h5>
                                    <div class="mb-4">
                                        @php
                                            $productTags = $product->tags()->pluck('tag_id');
                                        @endphp
                                        <select class="select2 form-control" multiple="multiple"
                                            data-placeholder="Выберите категории" name="tag_ids[]">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ $productTags->contains($tag->id) ? 'selected' : '' }}>
                                                    {{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--product tag end-->

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
                                                        <option value="{{ $brand->id }}"
                                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
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
                                                        <option value="{{ $unit->id }}"
                                                            {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
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
                                        <h5 class="mb-4">Цена,артикуль и склад
                                        </h5>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label fw-medium text-primary"
                                                for="is_variant">Имеет вариации?</label>
                                            <input type="checkbox" class="form-check-input" id="is_variant"
                                                onchange="isVariantProduct(this)" name="is_variant"
                                                @if ($product->has_variation) checked @endif>
                                        </div>
                                    </div>

                                    <!-- without variation start-->
                                    <div class="noVariation"
                                        @if ($product->has_variation) style="display:none;" @endif>
                                        @php
                                            $first_variation = $product->variations->first();
                                            $price = !$product->has_variation ? $first_variation->price : 0;
                                            $stock_qty = !$product->has_variation ? ($first_variation->product_variation_stock ? $first_variation->product_variation_stock->stock_qty : 0) : 1;
                                            $sku = !$product->has_variation ? $first_variation->sku : null;
                                            $code = !$product->has_variation ? $first_variation->code : null;
                                        @endphp

                                        <div class="row g-3">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="price"
                                                        class="form-label">Цена</label>
                                                    <input type="number" min="0" step="0.0001" id="price"
                                                        name="price" placeholder="Цена продукта"
                                                        class="form-control" value="{{ $price }}"
                                                        {{ !$product->has_variation ? 'required' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="stock" class="form-label">Склад
                                                        <small
                                                            class="text-warning">Склад местоположения по умолчанию</small>
                                                    </label>
                                                    <input type="number" id="stock"
                                                        placeholder="Количество на складе" name="stock"
                                                        class="form-control" value="{{ $stock_qty }}"
                                                        {{ !$product->has_variation ? 'required' : '' }}>

                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="sku"
                                                        class="form-label">Артикуль</label>
                                                    <input type="text" id="sku"
                                                        placeholder="Артикуль продукта" name="sku"
                                                        class="form-control" value="{{ $sku }}"
                                                        {{ !$product->has_variation ? 'required' : '' }}>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="code"
                                                        class="form-label">Код</label>
                                                    <input type="text" id="code"
                                                        placeholder="Код продукта" name="code"
                                                        value="{{ $code }}" class="form-control"
                                                        {{ !$product->has_variation ? 'required' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- without variation start end-->


                                    <!--for variation row start-->
                                    <div class="hasVariation"
                                        @if (!$product->has_variation) style="display:none;" @endif>
                                        @php
                                            $sizes = \App\Models\VariationValue::where('variation_id', 1)->get();
                                            $colors = \App\Models\VariationValue::where('variation_id', 2)->get();

                                            $selectedSizeIds = $product
                                                ->variation_combinations()
                                                ->where('variation_id', 1)
                                                ->pluck('variation_value_id')
                                                ->unique()
                                                ->toArray();

                                            $selectedColorIds = $product
                                                ->variation_combinations()
                                                ->where('variation_id', 2)
                                                ->pluck('variation_value_id')
                                                ->unique()
                                                ->toArray();
                                        @endphp

                                        <div class="row g-3">
                                            <!-- size -->
                                            @if (count($sizes) > 0)
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="product-thumb"
                                                            class="form-label">Размеры</label>
                                                        <input type="hidden" name="chosen_variations[]" value="1">
                                                        <select class="select2 form-control" multiple="multiple"
                                                            data-placeholder="Выберите размеры"
                                                            onchange="generateVariationCombinations()"
                                                            name="option_1_choices[]">
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size->id }}"
                                                                    {{ in_array($size->id, $selectedSizeIds) ? 'selected' : '' }}>
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
                                                    <div class="mb-3">
                                                        <label for="product-thumb"
                                                            class="form-label">Цвета</label>
                                                        <input type="hidden" name="chosen_variations[]" value="2">
                                                        <select class="select2 form-control" multiple="multiple"
                                                            data-placeholder="Выберите цвета"
                                                            onchange="generateVariationCombinations()"
                                                            name="option_2_choices[]">
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}"
                                                                    {{ in_array($color->id, $selectedColorIds) ? 'selected' : '' }}>
                                                                    {{ $color->collectLocalization('name') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- colors end -->
                                        </div>

                                        @foreach (generateVariationOptions(
            $product->variation_combinations()->whereNotIn('variation_id', [1, 2])->get(),
        ) as $key => $combination)
                                            <div class="row g-3">
                                                {{-- combination == variation --}}
                                                <div class="col-lg-6">
                                                    <div class="variation-names">
                                                        <input class="productVariation form-control bg-secondary"
                                                            value="{{ $combination['name'] }}" disabled />
                                                        <input type="hidden" name="chosen_variations[]"
                                                            value="{{ $combination['id'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="variationvalues">
                                                        @php
                                                            $variation_values = \App\Models\VariationValue::whereNotIn('variation_id', [1, 2])
                                                                ->where('variation_id', $combination['id'])
                                                                ->get();
                                                            $old_val = array_map(function ($val) {
                                                                return $val['id'];
                                                            }, $combination['values']);

                                                        @endphp

                                                        <div class="d-flex">
                                                            <div class="w-100">
                                                                <select class="form-control select2" data-toggle="select2"
                                                                    name="option_{{ $combination['id'] }}_choices[]"
                                                                    multiple onchange="generateVariationCombinations()">
                                                                    @foreach ($variation_values as $variation_value)
                                                                        <option value="{{ $variation_value->id }}"
                                                                            {{ in_array($variation_value->id, $old_val) ? 'selected' : '' }}>
                                                                            {{ $variation_value->collectLocalization('name') }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <button type="button" data-toggle="remove-parent"
                                                                class="btn btn-link px-2" data-parent=".row"
                                                                onclick="generateVariationCombinations()">
                                                                <i data-feather="trash-2" class="text-danger"></i>
                                                            </button>
                                                        </div>

                                                        @if ($loop->last)
                                                            <span class="text-danger fw-medium fs-xs first-info">
                                                                Прежде чем нажимать кнопку «Удалить», очистите выбранные варианты, если они выбраны.
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="chosen_variation_options"></div>

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

                                            <div class="variation_combination" id="variation_combination">
                                                {{-- variation combinations here --}}
                                                @if ($product->has_variation)
                                                    @include(
                                                        'backend.pages.products.products.update_variation_combinations',
                                                        [
                                                            'variations' => $product->variations,
                                                        ]
                                                    )
                                                @endif
                                            </div>

                                            <!-- size guide -->
                                            <div class="mt-4">
                                                <label class="form-label">Руководство по размеру продукта</label>
                                                <div class="tt-image-drop rounded">
                                                    <span
                                                        class="fw-semibold">Выберите изображение руководства по размеру</span>
                                                    <!-- choose media -->
                                                    <div class="tt-product-thumb show-selected-files mt-3">
                                                        <div class="avatar avatar-xl cursor-pointer choose-media"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                            onclick="showMediaManager(this)" data-selection="single">
                                                            <input type="hidden" name="size_guide"
                                                                value="{{ $product->size_guide }}">
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
                                            @php
                                                $start_date = $product->discount_start_date ? date('m/d/Y', $product->discount_start_date) : null;
                                                $end_date = $product->discount_end_date ? date('m/d/Y', $product->discount_end_date) : null;
                                            @endphp

                                            <div class="mb-3">
                                                <label class="form-label">Диапазон дат</label>
                                                <div class="input-group">
                                                    <input class="form-control date-range-picker date-range"
                                                        type="text"
                                                        placeholder="Дата начала - Дата окончания"
                                                        name="date_range"
                                                        @if ($start_date != null && $end_date != null) data-startdate="'{{ $start_date }}'"
                                                        data-enddate="'{{ $end_date }}'" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="discount_value"
                                                    class="form-label">Сумма скидки</label>
                                                <input class="form-control" type="number"
                                                    placeholder="Введите сумму скидки"
                                                    id="discount_value" value="0" step="0.001"
                                                    name="discount_value" value="{{ $product->discount_value }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="discount_type"
                                                    class="form-label">Процент или фиксированная</label>
                                                <select class="select2 form-control" id="discount_type"
                                                    name="discount_type">
                                                    <option value="percent"
                                                        {{ $product->discount_type == 'percent' ? 'selected' : '' }}>
                                                        Процент %</option>
                                                    <option value="flat"
                                                        {{ $product->discount_type == 'flat' ? 'selected' : '' }}>
                                                        Фиксированная</option>
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
                                                    min="1" class="form-control"
                                                    value="{{ $product->min_purchase_qty }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-0">
                                                <label for="max_purchase_qty"
                                                    class="form-label">Максимальное количество покупки</label>
                                                <input type="number" id="max_purchase_qty" name="max_purchase_qty"
                                                    min="1" class="form-control"
                                                    value="{{ $product->max_purchase_qty }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-none">
                                            <div class="mb-0">
                                                <label for="standard_delivery_hours"
                                                    class="form-label">Стандартное время доставки</label>
                                                <div class="input-group">
                                                    <input type="number" step="0.01" class="form-control"
                                                        name="standard_delivery_hours" value="72" min="0"
                                                        required id="standard_delivery_hours"
                                                        value="{{ $product->standard_delivery_hours }}">
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
                                                        name="express_delivery_hours" value="24" min="0"
                                                        required id="express_delivery_hours"
                                                        value="{{ $product->express_delivery_hours }}">
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
                                    <h5 class="mb-4">Налоги на товары по умолчанию 0%
                                    </h5>
                                    <div class="row g-3">
                                        @foreach ($taxes as $tax)
                                            @php
                                                $tax_value = 0;
                                                $tax_type = 'flat';
                                                foreach ($product->taxes as $productTax) {
                                                    if ($productTax->tax_id == $tax->id) {
                                                        $tax_value = $productTax->tax_value;
                                                        $tax_type = $productTax->tax_type;
                                                    }
                                                }
                                            @endphp

                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label">{{ $tax->name }}</label>
                                                    <input type="hidden" value="{{ $tax->id }}" name="tax_ids[]">
                                                    <input type="number" lang="en" min="0" step="0.01"
                                                        placeholder="{{ localize('Tax') }}" name="taxes[]"
                                                        class="form-control" required value="{{ $tax_value }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-0">
                                                    <label class="form-label">Процент или фиксированная</label>
                                                    <select class="select2 form-control" name="tax_types[]">
                                                        <option value="percent"
                                                            {{ $tax->tax_type == 'percent' ? 'selected' : '' }}>
                                                            Процент % </option>
                                                        <option value="flat"
                                                            {{ $tax->tax_type == 'flat' ? 'selected' : '' }}>
                                                            Фиксированная</option>
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
                                            <h5 class="mb-4">Цель продажи</h5>
                                            <div class="tt-select-brand">
                                                <input type="number" min="0" name="sell_target"
                                                    class="form-control"
                                                    placeholder="Введите цель продажи"
                                                    value="{{ $product->sell_target }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="mb-4">Статус продукта</h5>
                                            <div class="tt-select-brand">
                                                <select class="select2 form-control" id="is_published"
                                                    name="is_published">
                                                    <option value="1"
                                                        {{ $product->is_published == 1 ? 'selected' : '' }}>
                                                        Опубликован</option>
                                                    <option value="0"
                                                        {{ $product->is_published == 0 ? 'selected' : '' }}>
                                                        Не опубликован</option>
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
                                            placeholder="Введите мета-заголовок" class="form-control"
                                            value="{{ $product->meta_title }}">
                                        <span class="fs-sm text-muted">
                                           Установите заголовок метатега. Рекомендуется быть простым и уникальным
                                        </span>
                                    </div>

                                    <div class="mb-4">
                                        <label for="meta_description"
                                            class="form-label">Мета-описание</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="4"
                                            placeholder="Введите мета-описание">{{ $product->meta_description }}</textarea>
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
                                                        value="{{ $product->meta_img }}">
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
                                        <i data-feather="save" class="me-1"></i>Сохранить изменения
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
                            <h5 class="mb-4">Информация о товаре</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>

                                    @if (env('DEFAULT_LANGUAGE') == $lang_key)
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
                                            <a href="#section-4">Бренд продукта и единица измерения</a>
                                        </li>
                                        <li>
                                            <a href="#section-5">Цена, артикул, склад и вариации</a>
                                        </li>
                                        <li>
                                            <a href="#section-6">Скидка на продукт</a>
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
    @include('backend.inc.product-scripts')
@endsection
