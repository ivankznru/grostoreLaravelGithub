<ul class="tt-side-nav">

    <!-- dashboard -->
    <li class="side-nav-item nav-item">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="pie-chart"></i></span>
            <span class="tt-nav-link-text">Панель администратора</span>
        </a>
    </li>

    <!-- products -->
    <?php
        $productsActiveRoutes = ['admin.brands.index', 'admin.brands.edit', 'admin.units.index', 'admin.units.edit', 'admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit', 'admin.taxes.index', 'admin.taxes.edit', 'admin.categories.index', 'admin.categories.create', 'admin.categories.edit', 'admin.products.index', 'admin.products.create', 'admin.products.edit'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['products', 'categories', 'variations', 'brands', 'units', 'taxes'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($productsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#sidebarProducts"
                aria-expanded="<?php echo e(areActiveRoutes($productsActiveRoutes, 'true')); ?>" aria-controls="sidebarProducts"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="shopping-bag"></i></span>
                <span class="tt-nav-link-text">Продукты</span>
            </a>

            <div class="collapse <?php echo e(areActiveRoutes($productsActiveRoutes, 'show')); ?>" id="sidebarProducts">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.products.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit'])); ?>">Все продукты</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.categories.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit'])); ?>">Все категории</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.variations.index')); ?>"
                                class="<?php echo e(areActiveRoutes([
                                    'admin.variations.index',
                                    'admin.variations.edit',
                                    'admin.variationValues.index',
                                    'admin.variationValues.edit',
                                ])); ?>">Все варианты</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brands')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.brands.index', 'admin.brands.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.brands.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.brands.index', 'admin.brands.edit'])); ?>">Все бренды</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('units')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.units.index', 'admin.units.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.units.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.units.index'])); ?>">Все единицы</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxes')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.taxes.index', 'admin.taxes.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.taxes.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.taxes.index'])); ?>">Все налоги</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- pos -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pos'])): ?>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.pos.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="table"></i></span>
                <span class="tt-nav-link-text">Пос система</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- orders -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.orders.index', 'admin.orders.show'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.orders.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.orders.index', 'admin.orders.show'])); ?>">
                <span class="tt-nav-link-icon"><i data-feather="shopping-cart"></i></span>
                <span class="tt-nav-link-text">
                    <span>Заказы</span>

                    <?php
                        $newOrdersCount = \App\Models\Order::isPlaced()->count();
                    ?>

                    <?php if($newOrdersCount > 0): ?>
                        <small class="badge bg-danger">Новый</small>
                    <?php endif; ?>
                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- stock -->
    <?php
        $stockActiveRoutes = ['admin.stocks.create', 'admin.locations.index', 'admin.locations.create', 'admin.locations.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['add_stock', 'show_locations'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($stockActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#manageStock"
                aria-expanded="<?php echo e(areActiveRoutes($stockActiveRoutes, 'true')); ?>" aria-controls="manageStock"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="database"></i></span>
                <span class="tt-nav-link-text">Акции</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($stockActiveRoutes, 'show')); ?>" id="manageStock">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_stock')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.stocks.create'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.stocks.create')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.stocks.create'])); ?>">Добавить акции</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_locations')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.locations.index', 'admin.locations.create', 'admin.locations.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.locations.index')); ?>">Все местоположения</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- Users -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Пользователи</span>
    </li>

    <!-- customers -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers')): ?>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.customers.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="users"></i></span>
                <span class="tt-nav-link-text">Клиенты</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- staffs -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staffs')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.staffs.index', 'admin.staffs.create', 'admin.staffs.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.staffs.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Персонал сотрудников</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Contents -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Содержание</span>
    </li>

    <!-- tags -->
    <?php
        $tagsActiveRoutes = ['admin.tags.index', 'admin.tags.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tags')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($tagsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.tags.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="tag"></i></span>
                <span class="tt-nav-link-text">Теги</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- pages -->
    <?php
        $pagesActiveRoutes = ['admin.pages.index', 'admin.pages.create', 'admin.pages.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($pagesActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.pages.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="copy"></i></span>
                <span class="tt-nav-link-text">Страницы</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Blog Systems -->
    <?php
        $blogActiveRoutes = ['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit', 'admin.blogCategories.index', 'admin.blogCategories.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blogs', 'blog_categories'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($blogActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#blogSystem"
                aria-expanded="<?php echo e(areActiveRoutes($blogActiveRoutes, 'true')); ?>" aria-controls="blogSystem"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
                <span class="tt-nav-link-text">Блоги</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($blogActiveRoutes, 'show')); ?>" id="blogSystem">
                <ul class="side-nav-second-level">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.blogs.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'])); ?>">Все блоги</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog_categories')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.blogCategories.index', 'admin.blogCategories.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.blogCategories.index')); ?>">Категории</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- media manager -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('media_manager')): ?>
        <li class="side-nav-item">
            <a href="<?php echo e(route('admin.mediaManager.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
                <span class="tt-nav-link-text">Медиа-менеджер</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Promotions -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Акции</span>
    </li>
    <!-- newsletter -->
    <?php
        $newsletterActiveRoutes = ['admin.newsletters.index', 'admin.subscribers.index'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletters', 'subscribers'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($newsletterActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#newsletter"
                aria-expanded="<?php echo e(areActiveRoutes($newsletterActiveRoutes, 'true')); ?>" aria-controls="newsletter"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="map"></i></span>
                <span class="tt-nav-link-text">Информационные бюллетени</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($newsletterActiveRoutes, 'show')); ?>" id="newsletter">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletters')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.newsletters.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.newsletters.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.newsletters.index'])); ?>">Массовые рассылки</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribers')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.subscribers.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.subscribers.index')); ?>"
                                lass="<?php echo e(areActiveRoutes(['admin.newsletters.index'])); ?>">Подписчики</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- Coupons -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.coupons.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit'])); ?>">
                <span class="tt-nav-link-icon"> <i data-feather="scissors"></i></span>
                <span class="tt-nav-link-text">Купоны</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- campaigns -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campaigns')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.campaigns.index', 'admin.campaigns.create', 'admin.campaigns.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.campaigns.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="zap"></i></span>
                <span class="tt-nav-link-text">Кампании</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Fulfillment -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Исполнение</span>
    </li>
    <!-- Logistics -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('logistics')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.logistics.index', 'admin.logistics.create', 'admin.logistics.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.logistics.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="cpu"></i></span>
                <span class="tt-nav-link-text">Логистика</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- shipping zones -->
    <?php
        $logisticZoneActiveRoutes = ['admin.logisticZones.index', 'admin.logisticZones.create', 'admin.logisticZones.edit', 'admin.countries.index', 'admin.states.index', 'admin.states.create', 'admin.states.edit', 'admin.cities.index', 'admin.cities.create', 'admin.cities.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_zones')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($logisticZoneActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.logisticZones.index')); ?>" class="side-nav-link">
                <i class="uil-ship"></i>
                <span class="tt-nav-link-icon"><i data-feather="truck"></i></span>
                <span class="tt-nav-link-text">Зоны доставки</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Reports -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Отчеты</span>
    </li>

    <!-- reports -->
    <?php
        $reportActiveRoutes = ['admin.reports.orders', 'admin.reports.sales', 'admin.reports.categorySales', 'admin.reports.salesAmount', 'admin.reports.deliveryStatus'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order_reports', 'product_sale_reports', 'category_sale_reports', 'sales_amount_reports',
        'delivery_status_reports'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($reportActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#reports"
                aria-expanded="<?php echo e(areActiveRoutes($reportActiveRoutes, 'true')); ?>" aria-controls="reports"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="bar-chart"></i></span>
                <span class="tt-nav-link-text">Отчеты</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($reportActiveRoutes, 'show')); ?>" id="reports">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.orders'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.orders')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.orders'])); ?>">Отчет о заказах</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_sale_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.sales'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.sales')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.sales'])); ?>">Продажи продуктов</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_sale_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.categorySales'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.categorySales')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.categorySales'])); ?>">Категория Мудрые продажи</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_amount_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.salesAmount'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.salesAmount')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.salesAmount'])); ?>">Отчет о сумме продаж</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delivery_status_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.deliveryStatus'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.deliveryStatus')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.deliveryStatus'])); ?>">Отчет о статусе доставки</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Support -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Поддерживать</span>
    </li>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_us_messages')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.queries.index'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.queries.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.queries.index'])); ?>">
                <span class="tt-nav-link-icon"><i data-feather="hash"></i></span>
                <span class="tt-nav-link-text">
                    <span>Запросы</span>

                    <?php
                        $newMsgCount = \App\Models\ContactUsMessage::where('is_seen', 0)->count();
                    ?>

                    <?php if($newMsgCount > 0): ?>
                        <small class="badge bg-danger">Новый</small>
                    <?php endif; ?>
                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Settings -->
    <li class="side-nav-title side-nav-item nav-item">
        <span class="tt-nav-title-text">Настройки</span>
    </li>

    <!-- Appearance -->
    <?php
        $appearanceActiveRoutes = ['admin.appearance.header', 'admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling', 'admin.appearance.products.index', 'admin.appearance.products.details', 'admin.appearance.products.details.editWidget', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];

        $homepageActiveRoutes = ['admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling'];

    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['homepage', 'product_page', 'product_details_page', 'about_us_page', 'header', 'footer'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($appearanceActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#Appearance"
                aria-expanded="<?php echo e(areActiveRoutes($appearanceActiveRoutes, 'true')); ?>" aria-controls="Appearance"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="layout"></i></span>
                <span class="tt-nav-link-text">Появление</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($appearanceActiveRoutes, 'show')); ?>" id="Appearance">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('homepage')): ?>
                        <li class="<?php echo e(areActiveRoutes($homepageActiveRoutes, 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.homepage.hero')); ?>"
                                class="<?php echo e(areActiveRoutes($homepageActiveRoutes)); ?>">Домашняя страница</a>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_page')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.products.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.products.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.products.index'])); ?>">Страница продуктов</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_details_page')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.appearance.products.details', 'admin.appearance.products.details.editWidget'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.products.details')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.products.details'])); ?>">Информация о продукте</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('about_us_page')): ?>
                        <?php
                            $aboutUsActiveRoutes = ['admin.appearance.about-us.index', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];
                        ?>

                        <li class="<?php echo e(areActiveRoutes($aboutUsActiveRoutes, 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.about-us.index')); ?>"
                                class="<?php echo e(areActiveRoutes($aboutUsActiveRoutes)); ?>">О нас</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('header')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.header'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.header')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.header'])); ?>">Заголовок</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('footer')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.footer'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.footer')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.footer'])); ?>">Нижний колонтитул</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Roles & Permission -->
    <?php
        $rolesActiveRoutes = ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles_and_permissions')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($rolesActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.roles.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="unlock"></i></span>
                <span class="tt-nav-link-text">Роли и разрешения</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- system settings -->
    <?php
        $settingsActiveRoutes = ['admin.generalSettings', 'admin.orderSettings', 'admin.timeslot.edit', 'admin.languages.index', 'admin.languages.edit', 'admin.currencies.index', 'admin.currencies.edit', 'admin.languages.localizations', 'admin.smtpSettings.index'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['smtp_settings', 'general_settings', 'currency_settings', 'language_settings'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#systemSetting"
                aria-expanded="<?php echo e(areActiveRoutes($settingsActiveRoutes, 'true')); ?>" aria-controls="systemSetting"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="settings"></i></span>
                <span class="tt-nav-link-text">Настройки системы</span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($settingsActiveRoutes, 'show')); ?>" id="systemSetting">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.orderSettings', 'admin.timeslot.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.orderSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.generalSettings'])); ?>">Настройки заказа</a>
                        </li>
                    <?php endif; ?>

                    <li class="d-none <?php echo e(areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active')); ?>">
                        <a href="<?php echo e(route('admin.smtpSettings.index')); ?>"
                            class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'])); ?>">Магазин администратора</a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('smtp_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.smtpSettings.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'])); ?>">Настройки SMTP</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.generalSettings'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.generalSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.generalSettings'])); ?>">Общие настройки</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.settings.paymentMethods'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.settings.paymentMethods')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.settings.paymentMethods'])); ?>">Способы оплаты</a>
                        </li>
                    <?php endif; ?>

                    <li class="d-none <?php echo e(areActiveRoutes(['admin.settings.socialLogin'], 'tt-menu-item-active')); ?>">
                        <a href="<?php echo e(route('admin.settings.socialLogin')); ?>"
                            class="<?php echo e(areActiveRoutes(['admin.settings.socialLogin'])); ?>">Вход через социальные сети</a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.languages.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations'])); ?>">Многоязычные настройки</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.currencies.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations'])); ?>">Мультивалютные настройки</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>
</ul>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/sidebarMenus.blade.php ENDPATH**/ ?>