@extends('backend.layouts.master')

@section('title')
    Кампании {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Кампании</h2>
                            </div>
                            <div class="tt-action">
                                @can('add_campaings')
                                    <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary"><i
                                            data-feather="plus"></i> Добавить кампанию</a>
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
                                    <th class="text-center">С/Л</th>
                                    <th>Заголовок</th>
                                    <th data-breakpoints="xs sm">Дата начала</th>
                                    <th data-breakpoints="xs sm">Дата окончания</th>
                                    <th data-breakpoints="xs sm md">Опубликовано</th>
                                    <th data-breakpoints="xs sm" class="text-end">Действие
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaigns as $key => $campaign)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($campaigns->currentPage() - 1) * $campaigns->perPage() }}</td>
                                        <td>
                                            <a class="d-flex align-items-center">
                                                <div class="avatar avatar-sm">
                                                    <img class="rounded-circle"
                                                        src="{{ uploadedAsset($campaign->banner) }}"
                                                        alt="{{ $campaign->code }}" />
                                                </div>
                                                <h6 class="fs-sm mb-0 ms-2">{{ $campaign->title }}
                                                </h6>
                                            </a>
                                        </td>

                                        <td>{{ date('d-m-Y', $campaign->start_date) }}</td>
                                        <td>{{ date('d-m-Y', $campaign->end_date) }}</td>

                                        <td>
                                            @can('publish_campaigns')
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input"
                                                        onchange="updatePublishedStatus(this)"
                                                        @if ($campaign->is_published) checked @endif
                                                        value="{{ $campaign->id }}">
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

                                                    @can('edit_campaigns')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.campaigns.edit', ['id' => $campaign->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                            <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                        </a>
                                                    @endcan

                                                    @can('delete_campaigns')
                                                        <a href="#" class="dropdown-item confirm-delete"
                                                            data-href="{{ route('admin.campaigns.delete', $campaign->id) }}"
                                                            title="Удалить">
                                                            <i data-feather="trash-2" class="me-2"></i>
                                                           Удалить
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
                            <span>Показать
                                {{ $campaigns->firstItem() }}-{{ $campaigns->lastItem() }} Выкл
                                {{ $campaigns->total() }} Результаты</span>
                            <nav>
                                {{ $campaigns->appends(request()->input())->links() }}
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
        function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.campaigns.updatePublishedStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
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
