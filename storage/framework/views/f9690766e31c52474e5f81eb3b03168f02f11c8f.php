<header class="tt-top-fixed bg-light-subtle">
    <div class="container-fluid">
        <nav class="navbar navbar-top navbar-expand" id="navbarDefault">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="tt-mobile-toggle-brand d-lg-none d-md-none">
                    <a class="tt-toggle-sidebar pe-3" href="#offcanvasLeft" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasLeft">
                        <i data-feather="menu"></i>
                    </a>
                    <div class="tt-brand pe-3">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon"
                                alt="favicon" />
                        </a>
                    </div>
                </div>

                <?php if(Route::is('admin.pos.index')): ?>
                    <div class="align-items-center d-none d-lg-flex">
                        <a class="pe-3" href="<?php echo e(route('admin.dashboard')); ?>" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Go to Dashboard">
                            <i data-feather="pie-chart"></i>
                        </a>
                        <div class="tt-brand pe-3">
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon"
                                    alt="favicon" />
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="tt-search-box d-none d-md-block d-lg-block flex-grow-1 me-4">
                    <form action="">
                        <div class="input-group">
                            <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                    data-feather="search"></i></span>
                            <input class="form-control rounded-start w-100 border-0 bg-transparent" type="text"
                                name="search"
                                <?php if(isset($searchKey)): ?>
                                    value="<?php echo e($searchKey); ?>"
                                <?php endif; ?>
                                placeholder="Поиск...">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav flex-row align-items-center tt-top-navbar">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link tt-theme-toggle">
                            <div class="tt-theme-light"><i data-feather="moon"></i></div>
                            <div class="tt-theme-dark"><i data-feather="sun"></i></div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('home')); ?>" class="nav-link tt-visit-store" target="_blank">
                            <i data-feather="eye" class="me-2"></i>
                            Посетить магазин
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <?php
                            if (Session::has('locale')) {
                                $locale = Session::get('locale', Config::get('app.locale'));
                            } else {
                                $locale = env('DEFAULT_LANGUAGE');
                            }
                            $currentLanguage = \App\Models\Language::where('code', $locale)->first();
                        ?>

                    <li class="nav-item dropdown tt-curency-lang-dropdown d-none d-md-block">
                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="<?php echo e(staticAsset('backend/assets/img/flags/' . $currentLanguage->flag . '.png')); ?>"
                                alt="country" class="img-fluid me-1"> <?php echo e($currentLanguage->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end py-0 shadow border-0">
                            <?php $__currentLoopData = \App\Models\Language::where('is_active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- item-->
                                <li>
                                    <a href="javascript:void(0);"
                                        class="dropdown-item <?php if($currentLanguage->code == $language->code): ?> active <?php endif; ?>"
                                        onclick="changeLocaleLanguage(this)" data-flag="<?php echo e($language->code); ?>">
                                        <img src="<?php echo e(staticAsset('backend/assets/img/flags/' . $language->flag . '.png')); ?>"
                                            alt="<?php echo e($language->code); ?>" class="img-fluid me-1"> <span
                                            class="align-middle"><?php echo e($language->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>


                    <?php
                        if (Session::has('currency_code')) {
                            $currency_code = Session::get('currency_code', Config::get('app.currency_code'));
                        } else {
                            $currency_code = env('DEFAULT_CURRENCY');
                        }
                        $currentCurrency = \App\Models\Currency::where('code', $currency_code)->first();
                    ?>

                    <li class="nav-item dropdown tt-curency-lang-dropdown d-none d-md-block">
                        <a href="#" class="nav-link text-uppercase" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?php echo e($currentCurrency->symbol); ?> <?php echo e($currentCurrency->code); ?></a>
                        <ul class="dropdown-menu dropdown-menu-end py-0 shadow border-0">

                            <?php $__currentLoopData = \App\Models\Currency::where('is_active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="dropdown-item fs-xs text-uppercase" href="javascript:void(0);"
                                        onclick="changeLocaleCurrency(this)" data-currency="<?php echo e($currency->code); ?>">
                                        <?php echo e($currency->symbol); ?> <?php echo e($currency->code); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>

                    <?php
                        $newOrdersCount = 0;
                        $newMsgCount = 0;
                    ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
                        <?php
                            $newOrdersCount = \App\Models\Order::isPlaced()->count();
                        ?>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_us_messages')): ?>
                        <?php
                            $newMsgCount = \App\Models\ContactUsMessage::where('is_seen', 0)->count();
                        ?>
                    <?php endif; ?>


                    <a class="nav-link position-relative tt-notification" href="#" role="button"
                        id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        data-bs-auto-close="outside">
                        <i data-feather="bell"></i>
                        <?php if($newMsgCount > 0 || $newOrdersCount > 0): ?>
                            <span class="tt-notification-dot bg-danger rounded-circle"></span>
                        <?php endif; ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end py-0 shadow-sm border-0"
                        aria-labelledby="notificationDropdown">
                        <div class="card position-relative border-0">
                            <div class="card-body p-0">
                                <div class="scrollbar-overlay">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
                                        <?php if($newOrdersCount > 0): ?>
                                            <div class="p-3 position-relative border-bottom">
                                                <a href="<?php echo e(route('admin.orders.index')); ?>"
                                                    class="d-flex align-items-center">
                                                    <h4 class="fs-md mb-0"><i data-feather="shopping-cart"
                                                            class="me-1 text-accent" width="18"></i>
                                                        Размещен новый заказ (<?php echo e($newOrdersCount); ?>)</h4>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>


                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_us_messages')): ?>
                                        <?php if($newMsgCount > 0): ?>
                                            <div class="p-3 position-relative border-bottom">
                                                <a href="<?php echo e(route('admin.queries.index')); ?>"
                                                    class="d-flex align-items-center">
                                                    <h4 class="fs-md mb-0"><i data-feather="mail" width="18"
                                                            class="me-1 text-success"></i>
                                                        Новое контактное сообщение (<?php echo e($newMsgCount); ?>)</h4>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($newMsgCount <= 0 && $newOrdersCount <= 0): ?>
                                        <div class="p-3 position-relative border-bottom">
                                            <h4 class="fs-md mb-0 text-muted fw-normal"><i data-feather="info"
                                                    width="18"
                                                    class="me-1 text-danger"></i>Нет нового уведомления
                                            </h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>

                    <li class="nav-item dropdown tt-user-dropdown">
                        <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="true">
                            <div class="avatar avatar-sm status-online">
                                <img class="rounded-circle" src="<?php echo e(uploadedAsset(auth()->user()->avatar)); ?>"
                                    alt="avatar">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0 shadow-sm border-0"
                            aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body py-2">
                                    <ul class="tt-user-nav list-unstyled d-flex flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link px-0" href="<?php echo e(route('admin.profile')); ?>">
                                                <i data-feather="user" class="me-1 fs-sm"></i>
                                                Мой счет
                                            </a>
                                        </li>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general_settings')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link px-0" href="<?php echo e(route('admin.generalSettings')); ?>">
                                                    <i data-feather="settings" class="me-1 fs-sm"></i>
                                                    Настройки
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li class="nav-item">
                                            <a class="nav-link px-0" href="<?php echo e(route('logout')); ?>">
                                                <i data-feather="log-out"
                                                    class="me-1 fs-sm"></i>Выйти
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!--mobile offcanvas menu start-->
<div class="offcanvas offcanvas-start tt-aside-navbar" id="offcanvasLeft" tabindex="-1">
    <div class="offcanvas-header border-bottom">
        <div class="tt-brand">
            <a href="index.html" class="tt-brand-link">
                <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon ms-1"
                    alt="favicon" />
                <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="tt-brand-logo ms-2"
                    alt="logo" />
            </a>
        </div>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-2 pb-9" data-simplebar>
        <div class="tt-sidebar-nav">
            <nav class="navbar navbar-vertical">
                <div class="w-100">
                    <?php echo $__env->make('backend.inc.sidebarMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--mobile offcanvas menu end-->
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/navbar.blade.php ENDPATH**/ ?>