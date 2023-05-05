@extends('backend.layouts.master')

@section('title')
    Панель{{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    @can('dashboard')
        <section class="tt-section pt-4">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card tt-page-header">
                            <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                                <div class="tt-page-title">
                                    <h2 class="h5 mb-lg-0">Админка</h2>
                                </div>
                                <div class="tt-action">

                                    @can('manage_orders')
                                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary"><i
                                                data-feather="shopping-cart" class="me-2"></i>Управление продажами</a>
                                    @endcan

                                    @can('add_products')
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary ms-2"><i
                                                data-feather="plus" class="me-2"></i>
                                            Добавить продукт</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-xl-9">
                        <div class="row g-3">
                            <!-- total sales chart -->
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="card h-100 flex-column">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-muted">Полная оплата</span>
                                            <div class="dropdown tt-tb-dropdown fs-sm">
                                                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    @if (isset($timelineText))
                                                        {{ $timelineText }}
                                                    @else
                                                        Последние 7 дней
                                                    @endif
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end shadow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.dashboard') }}">Последние 7 дней</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.dashboard') }}?&timeline=30">Последние 30 дней</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.dashboard') }}?&timeline=90">Последние 3 меяца</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="fw-bold">{{ formatPrice($totalSalesData->totalEarning) }}</h4>
                                    </div>
                                    <div id="totalSales"></div>
                                </div>
                            </div>
                            <!-- total sales chart -->


                            <!-- top 5 category sales chart -->
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="card h-100 flex-column">
                                    <div class="card-body d-flex flex-column h-100">
                                        <span class="text-muted">5 лучших продаж в категории</span>
                                        <h4 class="fw-bold">{{ $totalCatSalesData->totalCategorySalesCount }}</h4>
                                        <div id="topFive"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- top 5 category sales chart -->

                            <!-- total order this month chart -->
                            <div class="col-sm-6 col-md-4 col-lg-4 d-none d-lg-block d-md-block">
                                <div class="card h-100 flex-column">
                                    <div class="card-body">
                                        <span class="text-muted">Заказы за последние 30 дней</span>
                                        <h4 class="fw-bold">{{ $totalOrdersData->totalOrders }}</h4>
                                    </div>
                                    <div id="last30DaysOrders"></div>
                                </div>
                            </div>
                            <!-- total order this month chart -->

                            <!-- sales this month chart -->
                            <div class="col-l2">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="text-muted">Продажи в этом месяце</span>
                                        </div>
                                        <h4 class="fw-bold mb-0">{{ formatPrice($thisMonthSaleData->totalEarning) }}</h4>
                                    </div>
                                    <div id="thisMonthChart" class="px-3"></div>
                                </div>
                            </div>
                            <!-- sales this month chart -->

                        </div>
                    </div>

                    <div class="col-xl-3">
                        <!-- top selling products -->
                        <div class="card h-100 flex-column">
                            <div class="card-body px-0">
                                <div class="px-3">
                                    <h5 class="fw-bold mb-1">Самые продаваемые продукты</h5>
                                    <span class="text-muted">
                                        {{ localize('We have listed ' . \App\Models\Product::count() . ' total products.') }}</span>
                                </div>
                                <div class="tt-top-selling mt-3 h-25rem" data-simplebar>
                                    <ul class="tt-top-selling-list list-unstyled mb-0 px-3">
                                        @php
                                            $top_selling_products = \App\Models\Product::where('total_sale_count', '>', 0)
                                                ->orderBy('total_sale_count', 'DESC')
                                                ->take(15)
                                                ->get();
                                        @endphp
                                        @foreach ($top_selling_products as $product)
                                            <li class="py-3 d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md flex-shrink-0">
                                                        <img class="rounded-circle"
                                                            src="{{ uploadedAsset($product->thumbnail_image) }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fs-md mb-0 tt-line-clamp tt-clamp-1">
                                                            {{ $product->collectLocalization('name') }}
                                                        </h6>
                                                        <span class="text-muted fs-sm">Бренд:
                                                            {{ optional($product->brand)->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="fw-bold heading-font text-end  cursor-pointer"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Тотальная распродажа">({{ $product->total_sale_count }})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- top selling products -->
                    </div>
                </div>

                @can('manage_orders')
                    <div class="row g-3 mb-3">
                        <a href="{{ route('admin.orders.index') }}" class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-primary rounded-circle">
                                                <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::count() }}</h4>
                                            <span class="text-muted">Всего заказов</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderPendingStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-warning rounded-circle">
                                                <span class="text-warning"> <i data-feather="clock"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isPlacedOrPending()->count() }}</h4>
                                            <span class="text-muted">Ожидание заказа</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderProcessingStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-info rounded-circle">
                                                <span class="text-info"> <i data-feather="refresh-cw"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isProcessing()->count() }}</h4>
                                            <span class="text-muted">Обработка заказа</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderDeliveredStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-success rounded-circle">
                                                <span class="text-success"> <i data-feather="check-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isDelivered()->count() }}</h4>
                                            <span class="text-muted">Всего доставлено</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                @can('orders')
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom-0">
                                    <div class="row justify-content-between g-3">
                                        <div class="col-auto flex-grow-1">
                                            <h5 class="mb-1">Недавние заказы</h5>
                                            <span class="text-muted">Ваши 10 самых последних заказов</span>
                                        </div>

                                        <div class="col-auto">
                                            @can('manage_orders')
                                                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                                                    <i data-feather="eye" width="18"></i>
                                                    Посмотреть все
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $orders = App\Models\Order::latest()
                                        ->take(10)
                                        ->get();
                                @endphp
                                <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                                    <thead>
                                        <tr>
                                            <th class="ps-4">Код заказа</th>
                                            <th data-breakpoints="xs sm md">Клиент</th>
                                            <th>Размещены на</th>
                                            <th data-breakpoints="xs">Предметы</th>
                                            <th data-breakpoints="xs">Статус платежа</th>
                                            <th data-breakpoints="xs">О состоянии доставки</th>
                                            <th data-breakpoints="xs">Тип доставки</th>
                                            <th data-breakpoints="xs" class="text-end">Действие</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($orders as $key => $order)
                                            <tr>

                                                <td class="fs-sm ps-4">
                                                    {{ getSetting('order_code_prefix') }}{{ $order->orderGroup->order_code }}
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img class="rounded-circle"
                                                                src="{{ uploadedAsset(optional($order->user)->avatar) }}"
                                                                alt="avatar"
                                                                onerror="this.onerror=null;this.src='{{ staticAsset('backend/assets/img/placeholder-thumb.png') }}';" />
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="fs-sm mb-0">{{ optional($order->user)->name }}</h6>
                                                            <span class="text-muted fs-sm">
                                                                {{ optional($order->user)->phone ?? '-' }}</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span
                                                        class="fs-sm">{{ date('d M, Y', strtotime($order->created_at)) }}</span>
                                                </td>



                                                <td class="tt-tb-price">
                                                    <span class="fw-bold">
                                                        {{ $order->orderItems()->count() }}
                                                    </span>
                                                </td>

                                                <td>
                                                    @if ($order->payment_status == unpaidPaymentStatus())
                                                        <span class="badge bg-soft-danger rounded-pill text-capitalize">
                                                            {{ $order->payment_status }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-soft-primary rounded-pill text-capitalize">
                                                            {{ $order->payment_status }}
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($order->delivery_status == orderDeliveredStatus())
                                                        <span class="badge bg-soft-primary rounded-pill text-capitalize">
                                                            {{ $order->delivery_status }}
                                                        </span>
                                                    @elseif($order->delivery_status == orderCancelledStatus())
                                                        <span class="badge bg-soft-danger rounded-pill text-capitalize">
                                                            {{ localize(Str::title(Str::replace('_', ' ', $order->delivery_status))) }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-soft-info rounded-pill text-capitalize">
                                                            {{ localize(Str::title(Str::replace('_', ' ', $order->delivery_status))) }}
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <span
                                                        class="badge rounded-pill text-capitalize {{ $order->shipping_delivery_type == getScheduledDeliveryType() ? 'bg-soft-warning' : 'bg-secondary' }}">
                                                        {{ Str::title(Str::replace('_', ' ', $order->shipping_delivery_type)) }}
                                                    </span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                                        class="btn btn-sm p-0 tt-view-details" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View Details">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endcan

                <!-- counter in dashboard -->
                <div class="row g-3 mb-3">
                    @can('manage_orders')
                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderPickedUpStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-info rounded-circle">
                                                <span class="text-info"> <i data-feather="arrow-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isPickedUp()->count() }}</h4>
                                            <span class="text-muted">Полученные заказы</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderCancelledStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-accent rounded-circle">
                                                <span class="text-accent"> <i data-feather="x"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isCancelled()->count() }}</h4>
                                            <span class="text-muted">Отмененные заказы</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.orders.index') }}?delivery_status={{ orderOutForDeliveryStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-warning rounded-circle">
                                                <span class="text-warning"> <i data-feather="truck"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isOutForDelivery()->count() }}</h4>
                                            <span class="text-muted">на доставке</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.orders.index') }}?payment_status={{ paidPaymentStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-success rounded-circle">
                                                <span class="text-success"> <i data-feather="dollar-sign"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isPaid()->count() }}</h4>
                                            <span class="text-muted">Оплаченные заказы</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.orders.index') }}?payment_status={{ unpaidPaymentStatus() }}"
                            class="col-lg-3 col-sm-6">
                            <div class="card h-100 flex-column">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg">
                                            <div class="text-center bg-soft-info rounded-circle">
                                                <span class="text-info"> <i data-feather="credit-card"></i></span>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="mb-1">{{ \App\Models\Order::isUnpaid()->count() }}</h4>
                                            <span class="text-muted">Неоплаченные заказы</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endcan

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-accent rounded-circle">
                                            <span class="text-accent"> <i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ formatPrice($todayEarning) }}</h4>
                                        <span class="text-muted">Сегодняшний доход</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-warning rounded-circle">
                                            <span class="text-warning"> <i data-feather="pause"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ formatPrice($todayPendingEarning) }}</h4>
                                        <span class="text-muted">Сегодняшняя незавершенная прибыль</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-success rounded-circle">
                                            <span class="text-success"> <i data-feather="bar-chart-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ formatPrice($thisYearEarning) }}</h4>
                                        <span class="text-muted">Заработок в этом году</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-info rounded-circle">
                                            <span class="text-info"> <i data-feather="dollar-sign"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ formatPrice($totalEarning) }}</h4>
                                        <span class="text-muted">Общий доход</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-accent rounded-circle">
                                            <span class="text-accent"> <i data-feather="shopping-cart"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ \App\Models\Product::sum('total_sale_count') }}</h4>
                                        <span class="text-muted">Общая продажа продукта</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-warning rounded-circle">
                                            <span class="text-warning"> <i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ $todaySaleCount }}</h4>
                                        <span class="text-muted">Сегодняшняя распродажа товара</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-success rounded-circle">
                                            <span class="text-success"> <i data-feather="check-circle"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ $monthSaleCount }}</h4>
                                        <span class="text-muted">Распродажа товаров в этом месяце</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-info rounded-circle">
                                            <span class="text-info"> <i data-feather="activity"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ $yearSaleCount }}</h4>
                                        <span class="text-muted">Распродажа продукции в этом году</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.customers.index') }}" class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-accent rounded-circle">
                                            <span class="text-accent"> <i data-feather="users"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ \App\Models\User::where('user_type', 'customer')->count() }}
                                        </h4>
                                        <span class="text-muted">Всего клиентов</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.subscribers.index') }}" class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-warning rounded-circle">
                                            <span class="text-warning"> <i data-feather="at-sign"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ \App\Models\SubscribedUser::count() }}</h4>
                                        <span class="text-muted">Всего подписчиков</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="col-lg-3 col-sm-6">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-success rounded-circle">
                                            <span class="text-success"> <i data-feather="sliders"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ \App\Models\Category::count() }}</h4>
                                        <span class="text-muted">Всего категорий</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.brands.index') }}" class="col-lg-3 col-sm-6 d-none">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-success rounded-circle">
                                            <span class="text-success"> <i data-feather="check-circle"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{ \App\Models\Brand::count() }}</h4>
                                        <span class="text-muted">Всего брендов</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- counter in dashboard -->

            </div>
        </section>
    @endcan
@endsection

@section('scripts')
    <script>
        "use strict";
        // total earning chart
        var totalSales = {
            chart: {
                type: "area",
                height: 80,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: 'Заработок',
                data: [{!! $totalSalesData->amount !!}],
            }, ],
            labels: [{!! $totalSalesData->labels !!}],
            xaxis: {
                type: "datetime",
            },
            yaxis: {
                min: 0,
            },
            colors: ["#FF7C08"],
        };
        new ApexCharts(document.querySelector("#totalSales"), totalSales).render();

        //pie chart top five
        var optionsTopFive = {
            chart: {
                type: "donut",
                height: 100,
                offsetY: 15,
                offsetX: -20,
            },
            series: {!! $totalCatSalesData->series !!},
            labels: [{!! $totalCatSalesData->labels !!}],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                },
            }, ],
        };

        var chartTopFive = new ApexCharts(
            document.querySelector("#topFive"),
            optionsTopFive
        );
        chartTopFive.render();

        // last 30 days order chart
        var optionsBar = {
            chart: {
                type: "bar",
                height: 80,
                width: "100%",
                stacked: true,
                offsetX: -3,
                sparkline: {
                    enabled: true,
                },
                zoom: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: false,
                    },
                    columnWidth: "60%",
                    endingShape: "rounded",
                },
            },
            colors: ["#1E90FF"],
            series: [{
                name: "Orders",
                data: [{!! $totalOrdersData->amount !!}],
            }, ],
            labels: [{!! $totalOrdersData->labels !!}],
            xaxis: {
                type: "datetime",
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: false,
                },
                labels: {
                    show: false,
                    style: {
                        fontSize: "14px",
                    },
                },
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            yaxis: {
                axisBorder: {
                    show: false,
                },
                labels: {
                    show: false,
                },
            },
            legend: {
                floating: false,
                position: "bottom",
                horizontalAlign: "right",
            },
            tooltip: {
                shared: true,
                intersect: false,
            },
        };
        var chartBar = new ApexCharts(document.querySelector("#last30DaysOrders"), optionsBar);
        chartBar.render();

        // this month sales
        var options = {
            chart: {
                height: 210,
                width: "100%",
                type: "area",
                offsetX: -10,
                zoom: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },

            colors: ["#4EB529"],
            series: [{
                name: "Sales",
                data: [{!! $thisMonthSaleData->amount !!}],
            }],
            zoom: {
                enabled: false,
            },
            legend: {
                show: false,
                enabled: false,
            },
            labels: [{!! $thisMonthSaleData->labels !!}],
            xaxis: {
                labels: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },

            }
        };
        var chart = new ApexCharts(document.querySelector("#thisMonthChart"), options);
        chart.render();
    </script>
@endsection
