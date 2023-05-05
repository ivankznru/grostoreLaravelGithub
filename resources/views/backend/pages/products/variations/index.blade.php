@extends('backend.layouts.master')

@section('title')
    Вариации {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Вариации</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4" id="section-1">
                                <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                                    <div class="card-header border-bottom-0">
                                        <div class="row justify-content-between g-3">
                                            <div class="col-auto flex-grow-1">
                                                <div class="tt-search-box">
                                                    <div class="input-group">
                                                        <span
                                                            class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                            <i data-feather="search"></i></span>
                                                        <input class="form-control rounded-start w-100" type="text"
                                                            id="search" name="search"
                                                            placeholder="Поиск"
                                                            @isset($searchKey)
                                                    value="{{ $searchKey }}"
                                                    @endisset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <select class="form-select select2" name="is_published"
                                                        data-minimum-results-for-search="Infinity">
                                                        <option value="">Выберите статус</option>
                                                        <option value="1"
                                                            @isset($is_published)
                                                                 @if ($is_published == 1) selected @endif
                                                                @endisset>
                                                            Активный </option>
                                                        <option value="0"
                                                            @isset($is_published)
                                                                 @if ($is_published == 0) selected @endif
                                                                @endisset>
                                                            Скрытый</option>
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
                                            <th class="text-center" width="7%">С/Л</th>
                                            <th>Имя</th>
                                            <th data-breakpoints="xs sm">Активный</th>
                                            <th data-breakpoints="xs sm" class="text-end">
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($variations as $key => $variation)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $key + 1 + ($variations->currentPage() - 1) * $variations->perPage() }}
                                                </td>
                                                <td>
                                                    <a class="javascript:void(0);" class="d-flex align-items-center">
                                                        <h6 class="fs-sm mb-0">
                                                            {{ $variation->collectLocalization('name') }}</h6>
                                                    </a>
                                                </td>
                                                <td>
                                                    @can('publish_variations')
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                onchange="updateStatus(this)"
                                                                @if ($variation->is_active) checked @endif
                                                                value="{{ $variation->id }}">
                                                        </div>
                                                    @endcan
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown tt-tb-dropdown">
                                                        <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end shadow">
                                                            @can('edit_variations')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.variations.edit', ['id' => $variation->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                    <i data-feather="edit-3"
                                                                        class="me-2"></i>Редактировать
                                                                </a>
                                                            @endcan

                                                            @can('variation_values')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.variationValues.index', ['id' => $variation->id]) }}">
                                                                    <i data-feather="plus"
                                                                        class="me-2"></i>Добавить значение
                                                                </a>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--pagination start-->
                                <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                                    <span>Показано
                                        {{ $variations->firstItem() }}-{{ $variations->lastItem() }} о
                                        {{ $variations->total() }} результаты</span>
                                    <nav>
                                        {{ $variations->appends(request()->input())->links() }}
                                    </nav>
                                </div>
                                <!--pagination end-->

                            </div>
                        </div>
                    </div>

                    @can('add_variations')
                        <form action="{{ route('admin.variations.store') }}" class="pb-650" method="POST">
                            @csrf
                            <!--variation info start-->
                            <div class="card mb-4" id="section-2">
                                <div class="card-body">
                                    <h5 class="mb-4">Добавить новую вариацию</h5>

                                    <div class="mb-4">
                                        <label for="name" class="form-label">Имя вариации</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            placeholder="Введите имя вариации" required>
                                    </div>

                                </div>
                            </div>
                            <!-- variation info end-->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-primary" type="submit">
                                            <i data-feather="save" class="me-1"></i>Сохранить вариацию
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">Информация о вариации</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Все вариации</a>
                                    </li>

                                    @can('add_variations')
                                        <li>
                                            <a href="#section-2">Добавить новую вариацию</a>
                                        </li>
                                    @endcan
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
    <script>
        'use strict';

        function updateStatus(el) {
            if (el.checked) {
                var is_active = 1;
            } else {
                var is_active = 0;
            }
            $.post('{{ route('admin.variations.updateStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    is_active: is_active
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', 'Статус успешно обновлен');
                    } else {
                        notifyMe('danger', 'Что-то пошло не так');
                    }
                });
        }
    </script>
@endsection
