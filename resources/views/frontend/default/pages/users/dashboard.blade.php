@extends('frontend.default.layouts.master')

@section('title')
    Панель управления клиентами {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="my-account pt-6 pb-120">
        <div class="container">

            @include('frontend.default.pages.users.partials.customerHero')

            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.default.pages.users.partials.customerSidebar')
                </div>

                <div class="col-xl-9">
                    <div class="recent-orders bg-white rounded py-5">
                        <h6 class="mb-4 px-4">Недавние заказы</h6>
                        @php
                            $recentOrders = \App\Models\Order::where('user_id', auth()->user()->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        <div class="table-responsive">
                            <table class="order-history-table table">
                                <tbody>
                                    <tr>
                                        <th>Код заказа</th>
                                        <th>Размещены на</th>
                                        <th>Предметы</th>
                                        <th>Всего</th>
                                        <th>Статус</th>
                                        <th class="text-center">Действие</th>
                                    </tr>

                                    @foreach ($recentOrders as $recentOrder)
                                        <tr>
                                            <td>{{ getSetting('order_code_prefix') }}{{ $recentOrder->orderGroup->order_code }}
                                            </td>
                                            <td>{{ date('d M, Y', strtotime($recentOrder->created_at)) }}</td>
                                            <td>{{ $recentOrder->orderItems()->count() }}</td>
                                            <td class="text-secondary">
                                                {{ formatPrice($recentOrder->orderGroup->grand_total_amount) }}</td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    {{ ucwords(str_replace('_', ' ', $recentOrder->delivery_status)) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('customers.trackOrder') }}?code={{ $recentOrder->orderGroup->order_code }}"
                                                    class="view-invoice fs-xs me-2" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-title="Отследить мой заказ"><i
                                                        class="fas fa-truck text-dark"></i></a>

                                                <a href="{{ route('checkout.success', $recentOrder->orderGroup->order_code) }}"
                                                    class="view-invoice fs-xs" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-title="Посмотреть детали"><i
                                                        class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
