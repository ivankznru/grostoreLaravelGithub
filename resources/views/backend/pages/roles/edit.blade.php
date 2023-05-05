@extends('backend.layouts.master')

@section('title')
    Обновить роль {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Обновить роль</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.roles.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя роли</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите имя роли" name="name" required
                                        value="{{ $role->name }}">
                                </div>

                            </div>
                        </div>
                        <!--basic information end-->

                        <!--Permissions start-->

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="tt-page-header" id="section-2">
                                    <div class="d-lg-flex align-items-center justify-content-lg-between">
                                        <div class="tt-page-title">
                                            <h2 class="h5 mb-lg-0">Разрешения</h2>
                                        </div>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label fw-medium text-primary"
                                                for="all_permissions">Выбрать все</label>
                                            <input type="checkbox" class="form-check-input" id="all_permissions"
                                                onchange="toggleSelectAll(this)" name="all_permissions">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($permission_groups as $permission_group)
                            <div class="card mb-4">
                                <div class="card-body group-wrapper">
                                    <div class="d-lg-flex align-items-center align-items-center">
                                        <label
                                            class="form-check-label fs-sm h6 bagde bg-soft-info rounded-pill px-3 p-2 cursor-pointer"
                                            for="group-{{ $permission_group[0]['id'] }}">Выбрать все
                                            {{ localize(ucwords(str_replace('_', ' ', $permission_group[0]['group_name']))) }}</label>

                                        <div class="form-check form-switch ms-3 opacity-0">
                                            <input type="checkbox" class="form-check-input permission-checkbox"
                                                id="group-{{ $permission_group[0]['id'] }}"
                                                onchange="toggleGroupAll(this)">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="row w-100 g-2">
                                            @foreach ($permission_group as $permission)
                                                <div class="col-6 col-md-4">
                                                    <div class="alert alert-secondary d-flex flex-wrap mb-0 py-2">
                                                        <label class="flex-grow-1 cursor-pointer"
                                                            for="permission-{{ $permission->id }}">
                                                            {{ localize(ucwords(str_replace('_', ' ', $permission->name))) }}
                                                        </label>

                                                        <div class="form-check form-switch mb-0">
                                                            <input type="checkbox"
                                                                class="form-check-input permission-checkbox"
                                                                name="permissions[]" id="permission-{{ $permission->id }}"
                                                                value="{{ $permission->id }}"
                                                                @if ($role->hasPermissionTo($permission->id)) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!--Permissions end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить изменения
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">Информация о роли</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">Разрешения</a>
                                    </li>
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
    @include('backend.pages.roles.inc.roleScripts')
@endsection
