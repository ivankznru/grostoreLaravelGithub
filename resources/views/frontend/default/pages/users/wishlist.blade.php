@extends('frontend.default.layouts.master')

@section('breadcrumb-contents')
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">Мой список пожеланий</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="{{ route('home') }}">Домашная страница</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">Мой список пожеланий</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contents')
    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->

    <!--wishlist section start-->
    <section class="wishlist-section ptb-120">
        <div class="container">
            <div class="rounded-2 overflow-hidden">
                <table class="wishlist-table w-100 bg-white">
                    <thead>
                        <th>Изображение</th>
                        <th>Имя продукта</th>
                        <th>Цена за одну единицу товара</th>
                        <th>Действие</th>
                    </thead>
                    <tbody class="text-center">
                        <!--wishlist listing-->
                        @forelse ($wishlist as $item)
                            <tr>
                                <td class="h-100px">
                                    <img src="{{ uploadedAsset($item->product->thumbnail_image) }}"
                                        alt="{{ $item->product->collectLocalization('name') }}" class="img-fluid"
                                        width="100">
                                </td>
                                <td class="product-title">
                                    <h6 class="mb-0">{{ $item->product->collectLocalization('name') }}
                                    </h6>
                                </td>
                                <td>
                                    <span class="text-dark fw-bold me-2 d-lg-none">Цена за единицу товара:</span>
                                    <span class="text-dark fw-bold">
                                        @include('frontend.default.pages.partials.products.pricing', [
                                            'product' => $item->product,
                                            'br' => true,
                                        ])
                                    </span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-sm ms-5 rounded-1"
                                        onclick="showProductDetailsModal({{ $item->product->id }})">Добавить в корзину</a>
                                    <a href="{{ route('customers.wishlist.delete', $item->id) }}" class="close-btn ms-3"><i
                                            class="fas fa-close"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4">Данные не найдены</td>
                            </tr>
                        @endforelse
                        <!--wishlist listing-->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--wishlist section end-->
@endsection
