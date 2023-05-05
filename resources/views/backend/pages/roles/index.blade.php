@extends('backend.layouts.master')

@section('title')
    Роли {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Роли</h2>
                            </div>
                            <div class="tt-action">
                                @can('add_roles_and_permissions')
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"><i
                                            data-feather="plus"></i> Добавить роль</a>
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
                                    <th class="text-center" width="7%">С/Л</th>
                                    <th>{{ localize('Name') }}</th>
                                    <th data-breakpoints="xs sm" class="text-end">Действие
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $role->name }}
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            @if ($role->name == 'Super Admin')
                                                <span class="badge bg-secondary rounded-pill">
                                                    н/а
                                                </span>
                                            @else
                                                <div class="dropdown tt-tb-dropdown">
                                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end shadow">

                                                        @can('edit_roles_and_permissions')
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.roles.edit', ['id' => $role->id, 'lang_key' => env('DEFAULT_LANGUAGE')]) }}&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i>Редактировать
                                                            </a>
                                                        @endcan

                                                        @can('delete_roles_and_permissions')
                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="{{ route('admin.roles.delete', $role->id) }}"
                                                                title="Удалить">
                                                                <i data-feather="trash-2" class="me-2"></i>
                                                                Удалить
                                                            </a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>Показано
                                {{ $roles->firstItem() }}-{{ $roles->lastItem() }}  о
                                {{ $roles->total() }} результаты</span>
                            <nav>
                                {{ $roles->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
