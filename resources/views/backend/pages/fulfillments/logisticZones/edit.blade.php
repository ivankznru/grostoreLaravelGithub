@extends('backend.layouts.master')

@section('title')
    Обновить зону {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Обновить зону доставки</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.logisticZones.update') }}" method="POST" class="pb-650">
                        @csrf
                        <input type="hidden" name="id" value="{{ $logisticZone->id }}">
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">Основная информация</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">Имя зоны</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="Напишите имя вашей зоны" name="name" required
                                        value="{{ $logisticZone->name }}">
                                </div>

                                <div class="mb-4">
                                    <label for="logistic_id" class="form-label">Логистика</label>
                                    <select class="form-control select2" name="logistic_id" class="w-100" id="logistic_id"
                                        data-toggle="select2" disabled>
                                        <option value="{{ $logisticZone->logistic->id }}" selected>
                                            {{ $logisticZone->logistic->name }}</option>
                                    </select>
                                </div>

                                <div class="mb-4">


                                    @php
                                        $logisticCities = $logisticZone->cities->pluck('id')->toArray();
                                    @endphp

                                    <label class="form-label">Города</label>
                                    <select class="form-control select2" name="city_ids[]" class="w-100" id="city_ids"
                                        data-toggle="select2" data-placeholder="Выберите города" multiple
                                        required>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ in_array($city->id, $logisticCities) ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label for="name"
                                        class="form-label">Стандартная стоимость доставки</label>
                                    <input type="number" step="0.001" name="standard_delivery_charge"
                                        id="standard_delivery_charge"
                                        placeholder="Стандартная стоимость доставки" class="form-control"
                                        min="0" required value="{{ $logisticZone->standard_delivery_charge }}">
                                </div>

                                <div class="mb-4">
                                    <label for="name"
                                        class="form-label">Стандартное время доставки</label>
                                    <input type="text" name="standard_delivery_time" id="standard_delivery_time"
                                        placeholder="1-3 дней" class="form-control" required
                                        value="{{ $logisticZone->standard_delivery_time }}">
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i>Сохранить изменения
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
                            <h5 class="mb-4">Информация о зоне</h5>
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
