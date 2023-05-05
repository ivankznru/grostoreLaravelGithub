<aside class="tt-sidebar bg-light-subtle" id="sidebar">
    <div class="tt-brand">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="tt-brand-link">
            <img src="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" class="tt-brand-favicon ms-1" alt="favicon" />
            <img src="<?php echo e(uploadedAsset(getSetting('admin_panel_logo'))); ?>" class="tt-brand-logo ms-2" alt="logo" />
        </a>
        <a href="javascript:void(0);" class="tt-toggle-sidebar">
            <span><i data-feather="chevron-left"></i></span>
        </a>
    </div>

    <div class="tt-sidebar-nav pb-9 pt-4" data-simplebar>

        <ul class="tt-side-nav">
            <li class="side-nav-item nav-item tt-sidebar-user">
                <div class="side-nav-link bg-secondary-subtle mx-2 rounded-3 px-2">
                    <div class="tt-user-avatar lh-1">
                        <div class="avatar avatar-md status-online">
                            <img class="rounded-circle" src="<?php echo e(uploadedAsset(auth()->user()->avatar)); ?>"
                                alt="avatar">
                        </div>
                    </div>
                    <div class="tt-nav-link-text ms-2">
                        <h6 class="mb-0 lh-1 tt-line-clamp tt-clamp-1"><?php echo e(auth()->user()->name); ?></h6>
                        <span
                            class="text-muted fs-sm"><?php echo e(auth()->user()->role ? auth()->user()->role->name : localize('Super Admin')); ?></span>
                    </div>
                </div>
            </li>
        </ul>
        <nav class="navbar navbar-vertical navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="w-100" id="leftside-menu-container">
                    <?php echo $__env->make('backend.inc.sidebarMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </nav>
    </div>
</aside>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/leftSidebar.blade.php ENDPATH**/ ?>