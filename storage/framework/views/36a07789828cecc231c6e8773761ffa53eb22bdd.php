<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="light">

<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--favicon icon-->
    <link rel="shortcut icon" href="<?php echo e(staticAsset('backend/assets/img/favicon.png')); ?>">

    <!--title-->
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <!--build:css-->
    <?php echo $__env->make('backend.inc.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end build -->
</head>

<body>
    <!--preloader start-->
    <div id="preloader" class="bg-light-subtle">
        <div class="preloader-wrap">
            <img src="<?php echo e(uploadedAsset(getSetting('navbar_logo'))); ?>" class="img-fluid">
            <div class="loading-bar"></div>
        </div>
    </div>
    <!--preloader end-->

    <!--sidebar section start-->
    <?php if(!Route::is('admin.pos.index')): ?>
        <?php echo $__env->make('backend.inc.leftSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!--sidebar section end-->

    <!--main content wrapper start-->
    <main class="tt-main-wrapper bg-secondary-subtle"
        <?php if(!Route::is('admin.pos.index')): ?> id="content" <?php else: ?>  id="pos-content" <?php endif; ?>>
        <!--header section start-->
        <?php echo $__env->make('backend.inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--header section end-->

        <!-- Start Content-->
        <?php echo $__env->yieldContent('contents'); ?>
        <!-- container -->

        <!--footer section start-->
        <?php if(!Route::is('admin.pos.index')): ?>
            <?php echo $__env->make('backend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!--footer section end-->

        <!-- media-manager -->
        <?php echo $__env->make('backend.inc.media-manager.media-manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>
    <!--main content wrapper end-->

    <!-- delete modal -->
    <?php echo $__env->make('backend.inc.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--build:js-->
    <?php echo $__env->make('backend.inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--endbuild-->

    <!-- scripts from different pages -->
    <?php echo $__env->yieldContent('scripts'); ?>

    <!-- required scripts -->
    <script>
        "use strict";

        // change language
        function changeLocaleLanguage(e) {
            var locale = e.dataset.flag;
            $.post("<?php echo e(route('backend.changeLanguage')); ?>", {
                _token: '<?php echo e(csrf_token()); ?>',
                locale: locale
            }, function(data) {
                location.reload();
            });
        }


        // change currency
        function changeLocaleCurrency(e) {
            var currency_code = e.dataset.currency;
            $.post("<?php echo e(route('backend.changeCurrency')); ?>", {
                _token: '<?php echo e(csrf_token()); ?>',
                currency_code: currency_code
            }, function(data) {
                location.reload();
            });
        }

        // change location
        function changeLocation(e) {
            var text = '<?php echo e(localize('If you change the location your cart will be cleared. Do you want to proceed?')); ?>'
            var confirm = window.confirm(text);
            if (confirm) {
                var location_id = e.dataset.location;
                $.post("<?php echo e(route('backend.changeLocation')); ?>", {
                    _token: '<?php echo e(csrf_token()); ?>',
                    location_id: location_id
                }, function(data) {
                    location.reload();
                });
            }
        }

        // localize data
        function localizeData(langKey) {
            window.location = '<?php echo e(url()->current()); ?>?lang_key=' + langKey + '&localize';
        }

        // ajax toast 
        function notifyMe(level, message) {
            if (level == 'danger') {
                level = 'error';
            }
            toastr.options = {
                closeButton: true,
                newestOnTop: false,
                progressBar: true,
                positionClass: "toast-top-center",
                preventDuplicates: false,
                onclick: null,
                showDuration: "3000",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
            };
            toastr[level](message);
        }

        //laravel flash toast messages 
        <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            notifyMe("<?php echo e($message['level']); ?>", "<?php echo e($message['message']); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
</body>

</html>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/layouts/master.blade.php ENDPATH**/ ?>