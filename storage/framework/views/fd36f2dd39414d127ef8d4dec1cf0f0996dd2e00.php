

<?php $__env->startSection('title'); ?>
    Настройка страницы продукта <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">Виджет сведений о продукте</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4" id="section-1">
                                <table class="table tt-footable" data-use-parent-width="true">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="7%">С/Л</th>
                                            <th>Изображение</th>
                                            <th data-breakpoints="xs sm">Заголовок</th>
                                            <th>Подзаголовок</th>
                                            <th data-breakpoints="xs sm" class="text-end">
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php echo e($key + 1); ?>

                                                </td>
                                                <td class="align-middle">
                                                    <div class="avatar avatar-sm">
                                                        <img class="rounded" src="<?php echo e(uploadedAsset($widget->image)); ?>"
                                                            alt="" />
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <h6 class="fs-sm mb-0">
                                                        <?php echo e($widget->title); ?></h6>
                                                </td>

                                                <td class="align-middle">
                                                    <h6 class="fs-sm mb-0">
                                                        <?php echo e($widget->sub_title); ?></h6>
                                                </td>

                                                <td class="text-end align-middle">
                                                    <div class="dropdown tt-tb-dropdown">
                                                        <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end shadow">

                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('admin.appearance.products.details.editWidget', ['id' => $widget->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i>Редактировать
                                                            </a>

                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="<?php echo e(route('admin.appearance.products.details.deleteWidget', $widget->id)); ?>"
                                                                title="Удалить">
                                                                <i data-feather="trash-2" class="me-2"></i>
                                                                Удалить
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo e(route('admin.appearance.products.details.storeWidget')); ?>" method="POST"
                        enctype="multipart/form-data" class="mb-3" id="section-one">
                        <?php echo csrf_field(); ?>
                        <!--widget info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-3">Добавить новый виджет</h5>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Заголовок</label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Написать заголовок" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sub_title" class="form-label">Подзаголовок</label>
                                    <input type="text" name="sub_title" id="sub_title"
                                        placeholder="Написать подзаголовок" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Иконка</label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выберите изображение иконки</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--widget info end-->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить виджет
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data"
                        class="pb-650" id="section-banner">
                        <?php echo csrf_field(); ?>
                        <!--widget info start-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-3">Добавить рекламный баннер</h5>

                                <div class="mb-3">
                                    <input type="hidden" name="types[]" value="product_page_banner_link">
                                    <label for="product_page_banner_link"
                                        class="form-label">Ссылка</label>
                                    <input type="url" name="product_page_banner_link" id="product_page_banner_link"
                                        placeholder="Написать ссылку" class="form-control"
                                        value="<?php echo e(getSetting('product_page_banner_link')); ?>">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Рекламный баннер</label>
                                    <input type="hidden" name="types[]" value="product_page_banner">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">Выбрать рекламный баннер</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="product_page_banner"
                                                    value="<?php echo e(getSetting('product_page_banner')); ?>">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--widget info end-->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> Сохранить баннер
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">Страница сведений о продукте</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-one" class="active">Виджеты</a>
                                    </li>

                                    <li>
                                        <a href="#section-banner">Рекламный баннер</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/pages/appearance/products/details.blade.php ENDPATH**/ ?>