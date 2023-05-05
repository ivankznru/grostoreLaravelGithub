@extends('backend.layouts.master')

@section('title')
    Запросы {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Запросы</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">

                        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">С/Л</th>
                                    <th>{{ localize('Name') }}</th>
                                    <th data-breakpoints="xs sm">Email</th>
                                    <th data-breakpoints="xs sm">Телефон</th>
                                    <th data-breakpoints="xs sm">Проблема</th>
                                    <th data-breakpoints="xs sm md lg xl">Сообщение</th>
                                    <th data-breakpoints="xs sm" class="text-end">Действие
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $key => $message)
                                    <tr class="{{ $message->is_seen == 0 ? 'fw-bold' : 'fw-light' }}">
                                        <td class="text-center">
                                            {{ $key + 1 + ($messages->currentPage() - 1) * $messages->perPage() }}
                                        </td>

                                        <td> {{ $message->name }} </td>

                                        <td>
                                            <a href="mailto:{{ $message->email }}"
                                                class="text-dark">{{ $message->email }}</a>
                                        </td>

                                        <td>
                                            {{ $message->phone ?? 'н/а' }}
                                        </td>

                                        <td>

                                            {{ Str::title(Str::replace('_', ' ', $message->support_for)) }}
                                        </td>


                                        <td>
                                            {{ $message->message }}
                                        </td>

                                        <td class="text-end">
                                            <div class="dropdown tt-tb-dropdown">
                                                <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end shadow">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.queries.markRead', ['id' => $message->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                        <i data-feather="check"
                                                            class="me-2"></i>{{ $message->is_seen == 0 ? 'Отметить как прочитанное' : 'Отметить как не прочитанное'}}
                                                    </a>

                                                    <a class="dropdown-item" href="mailto:{{ $message->email }}">
                                                        <i data-feather="message-circle"
                                                            class="me-2"></i>Ответить по электронной почте
                                                    </a>
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
                                {{ $messages->firstItem() }}-{{ $messages->lastItem() }} о
                                {{ $messages->total() }} результаты</span>
                            <nav>
                                {{ $messages->appends(request()->input())->links() }}
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
                        notifyMe('success', 'Статус успешно обновлен');

                    } else {
                        notifyMe('danger', 'Что-то пошло не так');
                    }
                });
        }
    </script>
@endsection
