@extends('backend.layouts.master')

@section('title')
    Клиенты {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"Клиенты</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search" placeholder="Поиск"
                                                    @isset($searchKey)
                                        value="{{ $searchKey }}"
                                        @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <select class="form-select select2" name="is_banned"
                                                data-minimum-results-for-search="Infinity">
                                                <option value="">Выберите статус</option>

                                                <option value="0"
                                                    @isset($is_banned)
                                                     @if ($is_banned == 0) selected @endif
                                                    @endisset>
                                                    Активный</option>

                                                <option value="1"
                                                    @isset($is_banned)
                                                     @if ($is_banned == 1) selected @endif
                                                    @endisset>
                                                    Забанен</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="search" width="18"></i>
                                            Поиск
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">С/Л</th>
                                    <th>Имя</th>
                                    <th data-breakpoints="xs sm">Email</th>
                                    <th data-breakpoints="xs sm">Телефон</th>
                                    <th data-breakpoints="xs sm" class="text-end">Забанен
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($customers->currentPage() - 1) * $customers->perPage() }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img class="rounded-circle"
                                                        src="{{ uploadedAsset($customer->avatar) }}" alt=""
                                                        onerror="this.onerror=null;this.src='{{ staticAsset('backend/assets/img/placeholder-thumb.png') }}';" />
                                                </div>
                                                <h6 class="fs-sm mb-0 ms-2">{{ $customer->name }}
                                                </h6>
                                            </a>
                                        </td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        <td>
                                            {{ $customer->phone ?? localize('n/a') }}
                                        </td>
                                        <td class="text-end">
                                            @can('ban_customers')
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input type="checkbox" onchange="updateBanStatus(this)"
                                                        class="form-check-input"
                                                        @if ($customer->is_banned) checked @endif
                                                        value="{{ $customer->id }}">
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>Показать
                                {{ $customers->firstItem() }}-{{ $customers->lastItem() }} о
                                {{ $customers->total() }} результаты</span>
                            <nav>
                                {{ $customers->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        "use strict";

        function updateBanStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.customers.updateBanStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', 'Статус успешно обнавлен');

                    } else {
                        notifyMe('danger', 'Что-то пошло не так');
                    }
                });
        }
    </script>
@endsection
