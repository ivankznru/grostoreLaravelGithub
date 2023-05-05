<section class="blog-section pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section-title text-center">
                    <h2 class="mb-3">Просмотреть недавнее сообщение</h2>
                    <p class="mb-0">Узнайте больше о наших последних эксклюзивных новостях, обновлениях и статьях
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-3">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-md-6">
                    <article class="blog-card rounded-2 overflow-hidden bg-white">
                        <div class="thumbnail overflow-hidden">
                            <img src="<?php echo e(uploadedAsset($blog->thumbnail_image)); ?>"
                                alt="<?php echo e($blog->collectLocalization('title')); ?>" class="img-fluid">
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-meta d-flex align-items-center gap-3 mb-1">
                                <span class="fs-xs fw-medium"><i
                                        class="fa-solid fa-tags me-1"></i><?php echo e(optional($blog->blog_category)->name); ?></span>
                                <span class="fs-xs fw-medium"><i
                                        class="fa-regular fa-clock me-1"></i><?php echo e(date('M d, Y', strtotime($blog->created_at))); ?></span>
                            </div>
                            <a href="<?php echo e(route('home.blogs.show', $blog->slug)); ?>">
                                <h3 class="mb-3 h5"><?php echo e($blog->collectLocalization('title')); ?></h3>
                            </a>
                            <p class="mb-0 mb-5"><?php echo e($blog->collectLocalization('short_description')); ?>

                            </p>
                            <a href="<?php echo e(route('home.blogs.show', $blog->slug)); ?>"
                                class="btn btn-primary-light btn-md">Узнайте больше<span
                                    class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/home/blogs.blade.php ENDPATH**/ ?>