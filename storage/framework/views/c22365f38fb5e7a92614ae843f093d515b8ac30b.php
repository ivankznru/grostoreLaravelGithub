<div class="offcanvas_menu position-fixed">
    <div class="tt-short-info d-none d-md-none d-lg-none d-xl-block">
        <button class="offcanvas-close"><i class="fa-solid fa-xmark"></i></button>
        <a href="<?php echo e(route('home')); ?>" class="logo-wrapper d-inline-block mb-5"><img
                src="<?php echo e(uploadedAsset(getSetting('navbar_logo'))); ?>" alt="logo"></a>
        <div class="offcanvas-content">
            <h4 class="mb-4"><?php echo e('About Us'); ?></h4>
            <p><?php echo e(getSetting('about_us')); ?></p>
            <a href="<?php echo e(route('home.pages.aboutUs')); ?>" class="btn btn-primary mt-4"><?php echo e('About Us'); ?></a>
        </div>
    </div>

    <div class="mobile-menu d-md-block d-lg-block d-xl-none mb-4">
        <button class="offcanvas-close"><i class="fa-solid fa-xmark"></i></button>

        <nav class="mobile-menu-wrapperoffcanvas-contact">
            <ul>
                <li>
                    <a href="<?php echo e(route('home')); ?>">Домашная страница</a>
                </li>
                <li>
                    <a href="<?php echo e(route('products.index')); ?>">Продукты</a>
                </li>
                <li>
                    <a href="<?php echo e(route('home.campaigns')); ?>">Кампании</a>
                </li>
                <li>
                    <a href="<?php echo e(route('home.coupons')); ?>">Купоны</a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Страницы<span class="ms-1 fs-xs float-end"><i
                                class="fa-solid fa-angle-right"></i></span></a>
                    <ul>
                        <?php
                            $pages = [];
                            if (getSetting('navbar_pages') != null) {
                                $pages = \App\Models\Page::whereIn('id', json_decode(getSetting('navbar_pages')))->get();
                            }
                        ?>

                        <li><a href="<?php echo e(route('home.blogs')); ?>">Блоги</a></li>
                        <li><a href="<?php echo e(route('home.pages.aboutUs')); ?>">О нас</a></li>
                        <li><a href="<?php echo e(route('home.pages.contactUs')); ?>">Связаться с нами</a></li>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navbarPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a
                                    href="<?php echo e(route('home.pages.show', $navbarPage->slug)); ?>"><?php echo e($navbarPage->title); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

                <?php if(auth()->guard()->check()): ?>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>">Выйти</a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>">Войти</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

    </div>

    <div class="offcanvas-contact mt-4">
        <h5 class="mb-4 mt-5"><?php echo e('Contact Info'); ?></h5>
        <address>
            <?php echo e(getSetting('topbar_location')); ?> <br>
            <a href="tel:<?php echo e(getSetting('navbar_contact_number')); ?>"><?php echo e(getSetting('navbar_contact_number')); ?></a> <br>
            <a href="mailto:<?php echo e(getSetting('topbar_email')); ?>"><?php echo e(getSetting('topbar_email')); ?></a>
        </address>
    </div>
    <div class="offcanvas-contact social-contact mt-4">
        <a href="<?php echo e(getSetting('facebook_link')); ?>" target="_blank" class="social-btn"><i
                class="fab fa-facebook-f"></i></a>
        <a href="<?php echo e(getSetting('twitter_link')); ?>" target="_blank" class="social-btn"><i
                class="fab fa-twitter"></i></a>
        <a href="<?php echo e(getSetting('linkedin_link')); ?>" target="_blank" class="social-btn"><i
                class="fab fa-linkedin"></i></a>
        <a href="<?php echo e(getSetting('youtube_link')); ?>" target="_blank" class="social-btn"><i
                class="fab fa-youtube"></i></a>
    </div>
</div>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/inc/offcanvas.blade.php ENDPATH**/ ?>