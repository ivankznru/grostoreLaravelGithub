@extends('frontend.default.layouts.master')

@section('title')
    Счет {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <!--invoice section start-->
    @if (!is_null($orderGroup))
        @php
            $order = $orderGroup->order;
            $orderItems = $order->orderItems;
        @endphp
        <section class="invoice-section pt-6 pb-120">
            <div class="container">
                <div class="invoice-box bg-white rounded p-4 p-sm-6">
                    <div class="row g-5 justify-content-between">
                        <div class="col-lg-6">
                            <div class="invoice-title d-flex align-items-center">
                                <h3>Счет</h3>
                                <span class="badge rounded-pill bg-primary-light text-primary fw-medium ms-3">
                                    {{ ucwords(str_replace('_', ' ', $order->delivery_status)) }}
                                </span>
                            </div>
                            <table class="invoice-table-sm">
                                <tr>
                                    <td><strong>Код заказа</strong></td>
                                    <td>{{ getSetting('order_code_prefix') }}{{ $orderGroup->order_code }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Дата</strong></td>
                                    <td>{{ date('d M, Y', strtotime($orderGroup->created_at)) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-5 col-md-8">
                            <div class="text-lg-end">
                                <a href="{{ route('home') }}"><img src="{{ uploadedAsset(getSetting('navbar_logo')) }}"
                                        alt="logo" class="img-fluid"></a>
                                <h6 class="mb-0 text-gray mt-4">{{ getSetting('site_address') }}</h6>
                            </div>
                        </div>
                    </div>
                    <span class="my-6 w-100 d-block border-top"></span>
                    <div class="row justify-content-between g-5">
                        <div class="col-xl-7 col-lg-6">
                            <div class="welcome-message">
                                <h4 class="mb-2">{{ auth()->user()->name }}</h4>
                                <p class="mb-0">
                                    Вот детали вашего заказа. Мы благодарим Вас за покупку</p>

                                @php
                                    $deliveryInfo = json_decode($order->scheduled_delivery_info);
                                @endphp

                                <p class="mb-0">Тип доставки:
                                    <span
                                        class="badge bg-primary">{{ Str::title(Str::replace('_', ' ', $order->shipping_delivery_type)) }}</span>


                                </p>
                                @if ($order->shipping_delivery_type == getScheduledDeliveryType())
                                    <p class="mb-0">
                                        Время доставки:
                                        {{ date('d F', $deliveryInfo->scheduled_date) }},
                                        {{ $deliveryInfo->timeline }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            @if (!$order->orderGroup->is_pos_order)
                                <div class="shipping-address d-flex justify-content-md-end">
                                    <div class="border-end pe-2">
                                        <h6 class="mb-2">Адрес доставки</h6>
                                        @php
                                            $shippingAddress = $orderGroup->shippingAddress;
                                        @endphp
                                        <p class="mb-0">{{ optional($shippingAddress)->address }},
                                            {{ optional(optional($shippingAddress)->city)->name }},
                                            {{ optional(optional($shippingAddress)->state)->name }},
                                            {{ optional(optional($shippingAddress)->country)->name }}</p>
                                    </div>
                                    <div class="ms-4">
                                        <h6 class="mb-2">Адрес для выставления счета</h6>
                                        @php
                                            $billingAddress = $orderGroup->billingAddress;
                                        @endphp
                                        <p class="mb-0">{{ optional($billingAddress)->address }},
                                            {{ optional(optional($billingAddress)->city)->name }},
                                            {{ optional(optional($billingAddress)->state)->name }},
                                            {{ optional(optional($billingAddress)->country)->name }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive mt-6">
                        <table class="table invoice-table">
                            <tr>
                                <th>С/Л</th>
                                <th>Продкты</th>
                                <th>Цена за штуку</th>
                                <th>Кол-во</th>
                                <th>Полная цена</th>
                            </tr>
                            @foreach ($orderItems as $key => $item)
                                @php
                                    $product = $item->product_variation->product;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-nowrap">
                                        <div class="d-flex">
                                            <img src="{{ uploadedAsset($product->thumbnail_image) }}"
                                                alt="{{ $product->collectLocalization('name') }}"
                                                class="img-fluid product-item d-none">
                                            {{-- <div class="ms-2"> --}}
                                            <div class="">
                                                <span>{{ $product->collectLocalization('name') }}</span>
                                                <div>
                                                    @foreach (generateVariationOptions($item->product_variation->combinations) as $variation)
                                                        <span class="fs-xs">
                                                            {{ $variation['name'] }}:
                                                            @foreach ($variation['values'] as $value)
                                                                {{ $value['name'] }}
                                                            @endforeach
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ formatPrice($item->unit_price) }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ formatPrice($item->total_price) }}</td>
                                </tr>
                            @endforeach


                        </table>
                    </div>
                    <div class="mt-4 table-responsive">
                        <table class="table footer-table">
                            <tr>
                                <td>
                                    <strong class="text-dark d-block text-nowrap">Способ оплаты</strong>
                                    <span> {{ ucwords(str_replace('_', ' ', $orderGroup->payment_method)) }}</span>
                                </td>

                                <td>
                                    <strong class="text-dark d-block text-nowrap">Промежуточный итог</strong>
                                    <span>{{ formatPrice($orderGroup->sub_total_amount) }}</span>
                                </td>
                                <td>
                                    <strong class="text-dark d-block text-nowrap">Стоимость доставки</strong>
                                    <span>{{ formatPrice($orderGroup->total_shipping_cost) }}</span>
                                </td>
                                @if ($orderGroup->total_coupon_discount_amount > 0)
                                    <td>
                                        <strong
                                            class="text-dark d-block text-nowrap">Купонная скидка</strong>
                                        <span>{{ formatPrice($orderGroup->total_coupon_discount_amount) }}</span>
                                    </td>
                                @endif

                                <td>
                                    <strong class="text-dark d-block text-nowrap">Итоговая цена</strong>
                                    <span
                                        class="text-primary fw-bold">{{ formatPrice($orderGroup->grand_total_amount) }}</span>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--invoice section end-->
@endsection
