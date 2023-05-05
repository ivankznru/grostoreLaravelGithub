<div class="offcanvas_menu position-fixed">
    <div class="tt-short-info d-none d-md-none d-lg-none d-xl-block">
        <button class="offcanvas-close"><i class="fa-solid fa-xmark"></i></button>
        <a href="{{ route('home') }}" class="logo-wrapper d-inline-block mb-5"><img
                src="{{ uploadedAsset(getSetting('navbar_logo')) }}" alt="logo"></a>
        <div class="offcanvas-content">
            <h4 class="mb-4">{{ 'About Us' }}</h4>
            <p>{{ getSetting('about_us') }}</p>
            <a href="{{ route('home.pages.aboutUs') }}" class="btn btn-primary mt-4">{{ 'About Us' }}</a>
        </div>
    </div>

    <div class="mobile-menu d-md-block d-lg-block d-xl-none mb-4">
        <button class="offcanvas-close"><i class="fa-solid fa-xmark"></i></button>

        <nav class="mobile-menu-wrapperoffcanvas-contact">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Домашная страница</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}">Продукты</a>
                </li>
                <li>
                    <a href="{{ route('home.campaigns') }}">Кампании</a>
                </li>
                <li>
                    <a href="{{ route('home.coupons') }}">Купоны</a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Страницы<span class="ms-1 fs-xs float-end"><i
                                class="fa-solid fa-angle-right"></i></span></a>
                    <ul>
                        @php
                            $pages = [];
                            if (getSetting('navbar_pages') != null) {
                                $pages = \App\Models\Page::whereIn('id', json_decode(getSetting('navbar_pages')))->get();
                            }
                        @endphp

                        <li><a href="{{ route('home.blogs') }}">Блоги</a></li>
                        <li><a href="{{ route('home.pages.aboutUs') }}">О нас</a></li>
                        <li><a href="{{ route('home.pages.contactUs') }}">Связаться с нами</a></li>
                        @foreach ($pages as $navbarPage)
                            <li><a
                                    href="{{ route('home.pages.show', $navbarPage->slug) }}">{{ $navbarPage->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @auth
                    <li>
                        <a href="{{ route('logout') }}">Выйти</a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}">Войти</a>
                    </li>
                @endguest
            </ul>
        </nav>

    </div>

    <div class="offcanvas-contact mt-4">
        <h5 class="mb-4 mt-5">{{ 'Contact Info' }}</h5>
        <address>
            {{ getSetting('topbar_location') }} <br>
            <a href="tel:{{ getSetting('navbar_contact_number') }}">{{ getSetting('navbar_contact_number') }}</a> <br>
            <a href="mailto:{{ getSetting('topbar_email') }}">{{ getSetting('topbar_email') }}</a>
        </address>
    </div>
    <div class="offcanvas-contact social-contact mt-4">
        <a href="{{ getSetting('facebook_link') }}" target="_blank" class="social-btn"><i
                class="fab fa-facebook-f"></i></a>
        <a href="{{ getSetting('twitter_link') }}" target="_blank" class="social-btn"><i
                class="fab fa-twitter"></i></a>
        <a href="{{ getSetting('linkedin_link') }}" target="_blank" class="social-btn"><i
                class="fab fa-linkedin"></i></a>
        <a href="{{ getSetting('youtube_link') }}" target="_blank" class="social-btn"><i
                class="fab fa-youtube"></i></a>
    </div>
</div>
