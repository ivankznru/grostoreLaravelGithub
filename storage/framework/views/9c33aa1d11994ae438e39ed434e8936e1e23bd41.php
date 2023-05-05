<div class="offcanvas offcanvas-bottom" id="offcanvasBottom" tabindex="-1">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">Медиафайлы</h5>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body bg-secondary-subtle" data-simplebar>

        <!-- content -->
        <?php echo $__env->make('backend.inc.media-manager.media-manager-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- content -->

        <div class="d-grid g-3 tt-media-select">
            <button class="btn btn-primary" onclick="showSelectedFilePreview()"
                data-bs-dismiss="offcanvas">Выбрать</button>
        </div>

    </div>
</div>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/media-manager/media-manager.blade.php ENDPATH**/ ?>