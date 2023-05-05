@extends('backend.layouts.master')

@section('title')
   Месторасположения {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Месторасположения</h2>
                            </div>
                            <div class="tt-action">
                                @can('add_locations')
                                    <a href="{{ route('admin.locations.create') }}" class="btn btn-primary"><i
                                            data-feather="plus"></i>Добавить месторасположение</a>
                                @endcan
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
                                            <select class="form-select select2" name="is_published"
                                                data-minimum-results-for-search="Infinity">
                                                <option value="">Выберите статус</option>
                                                <option value="1"
                                                    @isset($is_published)
                                                         @if ($is_published == 1) selected @endif
                                                        @endisset>
                                                    Опубликовано</option>
                                                <option value="0"
                                                    @isset($is_published)
                                                         @if ($is_published == 0) selected @endif
                                                        @endisset>
                                                    Скрытый</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary">
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
                                    <th class="text-center">С/Л
                                    </th>
                                    <th>Имя</th>
                                    <th data-breakpoints="xs sm">Адрес</th>
                                    <th data-breakpoints="xs sm md">По умолчанию</th>
                                    <th data-breakpoints="xs sm md">Опубликовано</th>
                                    <th data-breakpoints="xs sm md" class="text-end">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $key => $location)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($locations->currentPage() - 1) * $locations->perPage() }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="d-flex align-items-center" target="_blank">
                                                <div class="avatar avatar-sm">
                                                    <img class="rounded-circle"
                                                        src="{{ uploadedAsset($location->banner) }}" alt=""
                                                        onerror="this.onerror=null;this.src='{{ staticAsset('backend/assets/img/placeholder-thumb.png') }}';" />
                                                </div>
                                                <h6 class="fs-sm mb-0 ms-2">{{ $location->name }}
                                                </h6>
                                            </a>
                                        </td>
                                        <td>{{ $location->address }}</td>

                                        <td>
                                            @can('publish_locations')
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" onchange="updateDefaultStatus(this)"
                                                        class="form-check-input"
                                                        @if ($location->is_default) checked @endif
                                                        value="{{ $location->id }}">
                                                </div>
                                            @endcan
                                        </td>

                                        <td>
                                            @can('publish_locations')
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" onchange="updatePublishedStatus(this)"
                                                        class="form-check-input"
                                                        @if ($location->is_published) checked @endif
                                                        value="{{ $location->id }}">
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
                                                    @can('edit_locations')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.locations.edit', ['id' => $location->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                            <i data-feather="edit-3" class="me-2"></i>Редактировать
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
                                {{ $locations->firstItem() }}-{{ $locations->lastItem() }} о
                                {{ $locations->total() }} результаты</span>
                            <nav>
                                {{ $locations->appends(request()->input())->links() }}
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
        "use strict"

        // update default status
        function updateDefaultStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.locations.updateDefaultStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', 'Статус успешно обновлен');
                        location.reload()
                    } else {
                        notifyMe('danger', 'Что-то пошло не так');
                    }
                });
        }

        // update publish status
        function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.locations.updatePublishedStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', 'Статус успешно обновлен');
                    } else if (data == 3) {
                        notifyMe('warning', 'Местоположение по умолчанию не может быть скрыто');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }
    </script>
@endsection
