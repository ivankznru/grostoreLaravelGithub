<ul class="tt-side-nav">

    <!-- dashboard -->
    <li class="side-nav-item nav-item">
        <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="pie-chart"></i></span>
            <span class="tt-nav-link-text">Панель администратора</span>
        </a>
    </li>

    <!-- products -->
    @php
        $productsActiveRoutes = ['admin.brands.index', 'admin.brands.edit', 'admin.units.index', 'admin.units.edit', 'admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit', 'admin.taxes.index', 'admin.taxes.edit', 'admin.categories.index', 'admin.categories.create', 'admin.categories.edit', 'admin.products.index', 'admin.products.create', 'admin.products.edit'];
    @endphp

    @canany(['products', 'categories', 'variations', 'brands', 'units', 'taxes'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($productsActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#sidebarProducts"
                aria-expanded="{{ areActiveRoutes($productsActiveRoutes, 'true') }}" aria-controls="sidebarProducts"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="shopping-bag"></i></span>
                <span class="tt-nav-link-text">Продукты</span>
            </a>

            <div class="collapse {{ areActiveRoutes($productsActiveRoutes, 'show') }}" id="sidebarProducts">
                <ul class="side-nav-second-level">

                    @can('products')
                        <li
                            class="{{ areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.products.index') }}"
                                class="{{ areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit']) }}">Все продукты</a>
                        </li>
                    @endcan

                    @can('categories')
                        <li
                            class="{{ areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.categories.index') }}"
                                class="{{ areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit']) }}">Все категории</a>
                        </li>
                    @endcan

                    @can('variations')
                        <li
                            class="{{ areActiveRoutes(
                                ['admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit'],
                                'tt-menu-item-active',
                            ) }}">
                            <a href="{{ route('admin.variations.index') }}"
                                class="{{ areActiveRoutes([
                                    'admin.variations.index',
                                    'admin.variations.edit',
                                    'admin.variationValues.index',
                                    'admin.variationValues.edit',
                                ]) }}">Все варианты</a>
                        </li>
                    @endcan

                    @can('brands')
                        <li class="{{ areActiveRoutes(['admin.brands.index', 'admin.brands.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.brands.index') }}"
                                class="{{ areActiveRoutes(['admin.brands.index', 'admin.brands.edit']) }}">Все бренды</a>
                        </li>
                    @endcan

                    @can('units')
                        <li class="{{ areActiveRoutes(['admin.units.index', 'admin.units.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.units.index') }}"
                                class="{{ areActiveRoutes(['admin.units.index']) }}">Все единицы</a>
                        </li>
                    @endcan

                    @can('taxes')
                        <li class="{{ areActiveRoutes(['admin.taxes.index', 'admin.taxes.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.taxes.index') }}"
                                class="{{ areActiveRoutes(['admin.taxes.index']) }}">Все налоги</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    <!-- pos -->
    @canany(['pos'])
        <li class="side-nav-item nav-item">
            <a href="{{ route('admin.pos.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="table"></i></span>
                <span class="tt-nav-link-text">Пос система</span>
            </a>
        </li>
    @endcan

    <!-- orders -->
    @can('orders')
        <li
            class="side-nav-item nav-item {{ areActiveRoutes(['admin.orders.index', 'admin.orders.show'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.orders.index') }}"
                class="side-nav-link {{ areActiveRoutes(['admin.orders.index', 'admin.orders.show']) }}">
                <span class="tt-nav-link-icon"><i data-feather="shopping-cart"></i></span>
                <span class="tt-nav-link-text">
                    <span>Заказы</span>

                    @php
                        $newOrdersCount = \App\Models\Order::isPlaced()->count();
                    @endphp

                    @if ($newOrdersCount > 0)
                        <small class="badge bg-danger">Новый</small>
                    @endif
                </span>
            </a>
        </li>
    @endcan

    <!-- stock -->
    @php
        $stockActiveRoutes = ['admin.stocks.create', 'admin.locations.index', 'admin.locations.create', 'admin.locations.edit'];
    @endphp
    @canany(['add_stock', 'show_locations'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($stockActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#manageStock"
                aria-expanded="{{ areActiveRoutes($stockActiveRoutes, 'true') }}" aria-controls="manageStock"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="database"></i></span>
                <span class="tt-nav-link-text">Акции</span>
            </a>
            <div class="collapse {{ areActiveRoutes($stockActiveRoutes, 'show') }}" id="manageStock">
                <ul class="side-nav-second-level">

                    @can('add_stock')
                        <li class="{{ areActiveRoutes(['admin.stocks.create'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.stocks.create') }}"
                                class="{{ areActiveRoutes(['admin.stocks.create']) }}">Добавить акции</a>
                        </li>
                    @endcan

                    @can('show_locations')
                        <li
                            class="{{ areActiveRoutes(['admin.locations.index', 'admin.locations.create', 'admin.locations.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.locations.index') }}">Все местоположения</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    <!-- Users -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Пользователи</span>
    </li>

    <!-- customers -->
    @can('customers')
        <li class="side-nav-item nav-item">
            <a href="{{ route('admin.customers.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="users"></i></span>
                <span class="tt-nav-link-text">Клиенты</span>
            </a>
        </li>
    @endcan

    <!-- staffs -->
    @can('staffs')
        <li
            class="side-nav-item nav-item {{ areActiveRoutes(['admin.staffs.index', 'admin.staffs.create', 'admin.staffs.edit'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.staffs.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Персонал сотрудников</span>
            </a>
        </li>
    @endcan

    <!-- Contents -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Содержание</span>
    </li>

    <!-- tags -->
    @php
        $tagsActiveRoutes = ['admin.tags.index', 'admin.tags.edit'];
    @endphp
    @can('tags')
        <li class="side-nav-item nav-item {{ areActiveRoutes($tagsActiveRoutes, 'tt-menu-item-active') }}">
            <a href="{{ route('admin.tags.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="tag"></i></span>
                <span class="tt-nav-link-text">Теги</span>
            </a>
        </li>
    @endcan

    <!-- pages -->
    @php
        $pagesActiveRoutes = ['admin.pages.index', 'admin.pages.create', 'admin.pages.edit'];
    @endphp
    @can('pages')
        <li class="side-nav-item nav-item {{ areActiveRoutes($pagesActiveRoutes, 'tt-menu-item-active') }}">
            <a href="{{ route('admin.pages.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="copy"></i></span>
                <span class="tt-nav-link-text">Страницы</span>
            </a>
        </li>
    @endcan


    <!-- Blog Systems -->
    @php
        $blogActiveRoutes = ['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit', 'admin.blogCategories.index', 'admin.blogCategories.edit'];
    @endphp
    @canany(['blogs', 'blog_categories'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($blogActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#blogSystem"
                aria-expanded="{{ areActiveRoutes($blogActiveRoutes, 'true') }}" aria-controls="blogSystem"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
                <span class="tt-nav-link-text">Блоги</span>
            </a>
            <div class="collapse {{ areActiveRoutes($blogActiveRoutes, 'show') }}" id="blogSystem">
                <ul class="side-nav-second-level">
                    @can('blogs')
                        <li
                            class="{{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.blogs.index') }}"
                                class="{{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit']) }}">Все блоги</a>
                        </li>
                    @endcan

                    @can('blog_categories')
                        <li
                            class="{{ areActiveRoutes(['admin.blogCategories.index', 'admin.blogCategories.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.blogCategories.index') }}">Категории</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    <!-- media manager -->
    @can('media_manager')
        <li class="side-nav-item">
            <a href="{{ route('admin.mediaManager.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
                <span class="tt-nav-link-text">Медиа-менеджер</span>
            </a>
        </li>
    @endcan

    <!-- Promotions -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Акции</span>
    </li>
    <!-- newsletter -->
    @php
        $newsletterActiveRoutes = ['admin.newsletters.index', 'admin.subscribers.index'];
    @endphp
    @canany(['newsletters', 'subscribers'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($newsletterActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#newsletter"
                aria-expanded="{{ areActiveRoutes($newsletterActiveRoutes, 'true') }}" aria-controls="newsletter"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="map"></i></span>
                <span class="tt-nav-link-text">Информационные бюллетени</span>
            </a>
            <div class="collapse {{ areActiveRoutes($newsletterActiveRoutes, 'show') }}" id="newsletter">
                <ul class="side-nav-second-level">

                    @can('newsletters')
                        <li class="{{ areActiveRoutes(['admin.newsletters.index'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.newsletters.index') }}"
                                class="{{ areActiveRoutes(['admin.newsletters.index']) }}">Массовые рассылки</a>
                        </li>
                    @endcan

                    @can('subscribers')
                        <li class="{{ areActiveRoutes(['admin.subscribers.index'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.subscribers.index') }}"
                                lass="{{ areActiveRoutes(['admin.newsletters.index']) }}">Подписчики</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    <!-- Coupons -->
    @can('coupons')
        <li
            class="side-nav-item nav-item {{ areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.coupons.index') }}"
                class="side-nav-link {{ areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit']) }}">
                <span class="tt-nav-link-icon"> <i data-feather="scissors"></i></span>
                <span class="tt-nav-link-text">Купоны</span>
            </a>
        </li>
    @endcan

    <!-- campaigns -->
    @can('campaigns')
        <li
            class="side-nav-item nav-item {{ areActiveRoutes(['admin.campaigns.index', 'admin.campaigns.create', 'admin.campaigns.edit'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.campaigns.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="zap"></i></span>
                <span class="tt-nav-link-text">Кампании</span>
            </a>
        </li>
    @endcan

    <!-- Fulfillment -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Исполнение</span>
    </li>
    <!-- Logistics -->
    @can('logistics')
        <li
            class="side-nav-item nav-item {{ areActiveRoutes(['admin.logistics.index', 'admin.logistics.create', 'admin.logistics.edit'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.logistics.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="cpu"></i></span>
                <span class="tt-nav-link-text">Логистика</span>
            </a>
        </li>
    @endcan

    <!-- shipping zones -->
    @php
        $logisticZoneActiveRoutes = ['admin.logisticZones.index', 'admin.logisticZones.create', 'admin.logisticZones.edit', 'admin.countries.index', 'admin.states.index', 'admin.states.create', 'admin.states.edit', 'admin.cities.index', 'admin.cities.create', 'admin.cities.edit'];
    @endphp
    @can('shipping_zones')
        <li class="side-nav-item nav-item {{ areActiveRoutes($logisticZoneActiveRoutes, 'tt-menu-item-active') }}">
            <a href="{{ route('admin.logisticZones.index') }}" class="side-nav-link">
                <i class="uil-ship"></i>
                <span class="tt-nav-link-icon"><i data-feather="truck"></i></span>
                <span class="tt-nav-link-text">Зоны доставки</span>
            </a>
        </li>
    @endcan

    <!-- Reports -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Отчеты</span>
    </li>

    <!-- reports -->
    @php
        $reportActiveRoutes = ['admin.reports.orders', 'admin.reports.sales', 'admin.reports.categorySales', 'admin.reports.salesAmount', 'admin.reports.deliveryStatus'];
    @endphp

    @canany(['order_reports', 'product_sale_reports', 'category_sale_reports', 'sales_amount_reports',
        'delivery_status_reports'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($reportActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#reports"
                aria-expanded="{{ areActiveRoutes($reportActiveRoutes, 'true') }}" aria-controls="reports"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="bar-chart"></i></span>
                <span class="tt-nav-link-text">Отчеты</span>
            </a>
            <div class="collapse {{ areActiveRoutes($reportActiveRoutes, 'show') }}" id="reports">
                <ul class="side-nav-second-level">

                    @can('order_reports')
                        <li class="{{ areActiveRoutes(['admin.reports.orders'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.reports.orders') }}"
                                class="{{ areActiveRoutes(['admin.reports.orders']) }}">Отчет о заказах</a>
                        </li>
                    @endcan

                    @can('product_sale_reports')
                        <li class="{{ areActiveRoutes(['admin.reports.sales'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.reports.sales') }}"
                                class="{{ areActiveRoutes(['admin.reports.sales']) }}">Продажи продуктов</a>
                        </li>
                    @endcan

                    @can('category_sale_reports')
                        <li class="{{ areActiveRoutes(['admin.reports.categorySales'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.reports.categorySales') }}"
                                class="{{ areActiveRoutes(['admin.reports.categorySales']) }}">Категория Мудрые продажи</a>
                        </li>
                    @endcan

                    @can('sales_amount_reports')
                        <li class="{{ areActiveRoutes(['admin.reports.salesAmount'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.reports.salesAmount') }}"
                                class="{{ areActiveRoutes(['admin.reports.salesAmount']) }}">Отчет о сумме продаж</a>
                        </li>
                    @endcan

                    @can('delivery_status_reports')
                        <li class="{{ areActiveRoutes(['admin.reports.deliveryStatus'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.reports.deliveryStatus') }}"
                                class="{{ areActiveRoutes(['admin.reports.deliveryStatus']) }}">Отчет о статусе доставки</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan


    <!-- Support -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Поддерживать</span>
    </li>

    @can('contact_us_messages')
        <li class="side-nav-item nav-item {{ areActiveRoutes(['admin.queries.index'], 'tt-menu-item-active') }}">
            <a href="{{ route('admin.queries.index') }}"
                class="side-nav-link {{ areActiveRoutes(['admin.queries.index']) }}">
                <span class="tt-nav-link-icon"><i data-feather="hash"></i></span>
                <span class="tt-nav-link-text">
                    <span>Запросы</span>

                    @php
                        $newMsgCount = \App\Models\ContactUsMessage::where('is_seen', 0)->count();
                    @endphp

                    @if ($newMsgCount > 0)
                        <small class="badge bg-danger">Новый</small>
                    @endif
                </span>
            </a>
        </li>
    @endcan

    <!-- Settings -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Настройки</span>
    </li>

    <!-- Appearance -->
    @php
        $appearanceActiveRoutes = ['admin.appearance.header', 'admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling', 'admin.appearance.products.index', 'admin.appearance.products.details', 'admin.appearance.products.details.editWidget', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];

        $homepageActiveRoutes = ['admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling'];

    @endphp

    @canany(['homepage', 'product_page', 'product_details_page', 'about_us_page', 'header', 'footer'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($appearanceActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#Appearance"
                aria-expanded="{{ areActiveRoutes($appearanceActiveRoutes, 'true') }}" aria-controls="Appearance"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="layout"></i></span>
                <span class="tt-nav-link-text">Появление</span>
            </a>
            <div class="collapse {{ areActiveRoutes($appearanceActiveRoutes, 'show') }}" id="Appearance">
                <ul class="side-nav-second-level">

                    @can('homepage')
                        <li class="{{ areActiveRoutes($homepageActiveRoutes, 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.homepage.hero') }}"
                                class="{{ areActiveRoutes($homepageActiveRoutes) }}">Домашняя страница</a>
                        </li>
                    @endcan


                    @can('product_page')
                        <li class="{{ areActiveRoutes(['admin.appearance.products.index'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.products.index') }}"
                                class="{{ areActiveRoutes(['admin.appearance.products.index']) }}">Страница продуктов</a>
                        </li>
                    @endcan

                    @can('product_details_page')
                        <li
                            class="{{ areActiveRoutes(['admin.appearance.products.details', 'admin.appearance.products.details.editWidget'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.products.details') }}"
                                class="{{ areActiveRoutes(['admin.appearance.products.details']) }}">Информация о продукте</a>
                        </li>
                    @endcan

                    @can('about_us_page')
                        @php
                            $aboutUsActiveRoutes = ['admin.appearance.about-us.index', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];
                        @endphp

                        <li class="{{ areActiveRoutes($aboutUsActiveRoutes, 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.about-us.index') }}"
                                class="{{ areActiveRoutes($aboutUsActiveRoutes) }}">О нас</a>
                        </li>
                    @endcan

                    @can('header')
                        <li class="{{ areActiveRoutes(['admin.appearance.header'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.header') }}"
                                class="{{ areActiveRoutes(['admin.appearance.header']) }}">Заголовок</a>
                        </li>
                    @endcan

                    @can('footer')
                        <li class="{{ areActiveRoutes(['admin.appearance.footer'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.appearance.footer') }}"
                                class="{{ areActiveRoutes(['admin.appearance.footer']) }}">Нижний колонтитул</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcanany


    <!-- Roles & Permission -->
    @php
        $rolesActiveRoutes = ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit'];
    @endphp
    @can('roles_and_permissions')
        <li class="side-nav-item nav-item {{ areActiveRoutes($rolesActiveRoutes, 'tt-menu-item-active') }}">
            <a href="{{ route('admin.roles.index') }}" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="unlock"></i></span>
                <span class="tt-nav-link-text">Роли и разрешения</span>
            </a>
        </li>
    @endcan


    <!-- system settings -->
    @php
        $settingsActiveRoutes = ['admin.generalSettings', 'admin.orderSettings', 'admin.timeslot.edit', 'admin.languages.index', 'admin.languages.edit', 'admin.currencies.index', 'admin.currencies.edit', 'admin.languages.localizations', 'admin.smtpSettings.index'];
    @endphp

    @canany(['smtp_settings', 'general_settings', 'currency_settings', 'language_settings'])
        <li class="side-nav-item nav-item {{ areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active') }}">
            <a data-bs-toggle="collapse" href="#systemSetting"
                aria-expanded="{{ areActiveRoutes($settingsActiveRoutes, 'true') }}" aria-controls="systemSetting"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="settings"></i></span>
                <span class="tt-nav-link-text">Настройки системы</span>
            </a>
            <div class="collapse {{ areActiveRoutes($settingsActiveRoutes, 'show') }}" id="systemSetting">
                <ul class="side-nav-second-level">

                    @can('order_settings')
                        <li
                            class="{{ areActiveRoutes(['admin.orderSettings', 'admin.timeslot.edit'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.orderSettings') }}"
                                class="{{ areActiveRoutes(['admin.generalSettings']) }}">Настройки заказа</a>
                        </li>
                    @endcan

                    <li class="d-none {{ areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active') }}">
                        <a href="{{ route('admin.smtpSettings.index') }}"
                            class="{{ areActiveRoutes(['admin.smtpSettings.index']) }}">Магазин администратора</a>
                    </li>

                    @can('smtp_settings')
                        <li class="{{ areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.smtpSettings.index') }}"
                                class="{{ areActiveRoutes(['admin.smtpSettings.index']) }}">Настройки SMTP</a>
                        </li>
                    @endcan

                    @can('general_settings')
                        <li class="{{ areActiveRoutes(['admin.generalSettings'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.generalSettings') }}"
                                class="{{ areActiveRoutes(['admin.generalSettings']) }}">Общие настройки</a>
                        </li>
                    @endcan

                    @can('payment_settings')
                        <li class="{{ areActiveRoutes(['admin.settings.paymentMethods'], 'tt-menu-item-active') }}">
                            <a href="{{ route('admin.settings.paymentMethods') }}"
                                class="{{ areActiveRoutes(['admin.settings.paymentMethods']) }}">Способы оплаты</a>
                        </li>
                    @endcan

                    <li class="d-none {{ areActiveRoutes(['admin.settings.socialLogin'], 'tt-menu-item-active') }}">
                        <a href="{{ route('admin.settings.socialLogin') }}"
                            class="{{ areActiveRoutes(['admin.settings.socialLogin']) }}">Вход через социальные сети</a>
                    </li>

                    @can('language_settings')
                        <li
                            class="{{ areActiveRoutes(
                                ['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations'],
                                'tt-menu-item-active',
                            ) }}">
                            <a href="{{ route('admin.languages.index') }}"
                                class="{{ areActiveRoutes(['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations']) }}">Многоязычные настройки</a>
                        </li>
                    @endcan

                    @can('currency_settings')
                        <li
                            class="{{ areActiveRoutes(
                                ['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations'],
                                'tt-menu-item-active',
                            ) }}">
                            <a href="{{ route('admin.currencies.index') }}"
                                class="{{ areActiveRoutes(['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations']) }}">Мультивалютные настройки</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan
</ul>
