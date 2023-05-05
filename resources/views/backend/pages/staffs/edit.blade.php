@extends('backend.layouts.master')

@section('title')
    Обновление штата сотрудников {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Обновить штат сотрудников</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.staffs.update') }}" method="POST" class="pb-650">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя сотрудника</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Введите имя сотрудника" name="name" required
                                        value="{{ $user->name }}">
                                </div>


                                <div class="mb-4">
                                    <label for="email" class="form-label">Эл.почта сотрудника</label>
                                    <input class="form-control" type="email" id="email"
                                        placeholder="Введите эл.почту сотрудника" name="email" required
                                        value="{{ $user->email }}">
                                </div>


                                <div class="mb-4">
                                    <label class="form-label">Роль сотрудника</label>
                                    <select class="select2 form-control" data-toggle="select2" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="form-label">Телефон сотрудника</label>
                                    <input class="form-control" type="text" id="phone"
                                        placeholder="Введите телефон сотрудника"
                                        name="phone"value="{{ $user->phone }}">
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input class="form-control" type="password" id="password"
                                        placeholder="Введите пароль" name="password">
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i>Сохранить сотрудника
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
                            <h5 class="mb-4">Информация о сотруднике</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">Основная информация</a>
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
