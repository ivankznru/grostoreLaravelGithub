@extends('frontend.default.layouts.master')

@section('title')
    Кампании {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">Все кампании</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="{{ route('home') }}">Домашная страница</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">Кампании</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contents')
    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->

    <!--campaign section start-->
    <section class="tt-campaigns ptb-100">
        <div class="container">
            <div class="row g-4">

                @php
                    $campaigns = \App\Models\Campaign::where('end_date', '>=', strtotime(date('Y-m-d')))
                        ->where('is_published', 1)
                        ->latest()
                        ->get();
                @endphp

                @forelse ($campaigns as $campaign)
                    <div class="col-lg-6 col-md-6">
                        <div class="card shadow-sm border-0 tt-single-campaign tt-gradient-right"
                            style="background:
          url('{{ uploadedAsset($campaign->banner) }}')no-repeat center
          center / cover">
                            <div class="card-body p-5 w-75">
                                <h3 class="h5 text-light">{{ $campaign->title }}</h3>
                                <ul class="timing-countdown countdown-timer d-flex align-items-center gap-2 mt-3"
                                    data-date="{{ date('m/d/Y', $campaign->end_date) }} 23:59:59">
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 days fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Дни</span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 hours fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Часы</span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 minutes fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Мин</span>
                                    </li>
                                    <li
                                        class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                                        <h5 class="mb-1 seconds fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Сек</span>
                                    </li>
                                </ul>
                                <a href="{{ route('home.campaigns.show', $campaign->slug) }}"
                                    class="btn btn-secondary btn-md mt-5">Посмотреть продукты</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 col-md-6 mx-auto">

                        <img src="{{ staticAsset('frontend/default/assets/img/no-data-found.png') }}" class="img-fluid"
                            alt="">
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--campaign section end-->
@endsection
