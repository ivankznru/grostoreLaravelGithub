@extends('frontend.default.layouts.master')

@section('title')
    История заказов клиентов {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
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

                    <div class="order-tracking-wrap bg-white rounded py-5 px-4">

                        <h6 class="mb-4">История заказов клиентов</h6>
                        <form class="search-form d-flex align-items-center mb-5 justify-content-center"
                            action="{{ route('customers.trackOrder') }}">
                            <div class="input-group mb-3 d-flex justify-content-center">
                                @if (getSetting('order_code_prefix') != null)
                                    <div class="input-group-prepend">
                                        <span
                                            class="input-group-text rounded-0 rounded-start">{{ getSetting('order_code_prefix') }}</span>
                                    </div>
                                @endif
                                <input type="text" class="w-50" placeholder="Код" name="code"
                                    @isset($searchCode)
                                            value="{{ $searchCode }}"
                                            @endisset>

                                <button type="submit" class="btn btn-secondary px-3"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>


                        @isset($order)
                            <ol id="progress-bar">

                                <li class="fs-xs tt-step @if ($order->delivery_status != orderCancelledStatus()) tt-step-done @endif">
                                    Отслеживание заказа</li>
                                <li
                                    class="fs-xs tt-step @if ($order->delivery_status == orderProcessingStatus() || $order->delivery_status == orderDeliveredStatus()) tt-step-done
@elseif ($order->delivery_status == orderPendingStatus())
active @endif">
                                    В ожидании</li>
                                <li
                                    class="fs-xs tt-step @if ($order->delivery_status == orderDeliveredStatus()) tt-step-done
                                    @elseif ($order->delivery_status == orderProcessingStatus())
                                    active @endif">
                                    В обработке</li>
                                <li class="fs-xs tt-step @if ($order->delivery_status == orderDeliveredStatus()) tt-step-done @endif">
                                    Доставлен</li>
                            </ol>
                            <div class="table-responsive-md mt-5">
                                <table class="table table-bordered fs-xs">
                                    <thead>
                                        <tr>
                                            <th scope="col">Дата и время</th>
                                            <th scope="col">Информация о статусе</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($order->orderUpdates as $orderUpdate)
                                            <tr>
                                                <td>{{ date('d M, Y', strtotime($orderUpdate->created_at)) }}</td>
                                                <td>{{ $orderUpdate->note }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td> {{ date('d M, Y', strtotime($order->created_at)) }} </td>
                                            <td>Заказ был размещен</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
