<!-- bundle -->
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/jquery-3.6.4.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/toastr.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/footable.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/select2.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/feather.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/summernote-lite.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/vendors/apex-scripts.js')); ?>"></script>
<script src="<?php echo e(staticAsset('backend/assets/js/app.js')); ?>"></script>

<!-- localizations & others -->
<script>
    'use strict';

    var TT = TT || {};
    TT.localize = {
        no_data_found: '<?php echo e(localize('No data found')); ?>',
        selected_file: '<?php echo e(localize('Selected File')); ?>',
        selected_files: '<?php echo e(localize('Selected Files')); ?>',
        file_added: '<?php echo e(localize('File added')); ?>',
        files_added: '<?php echo e(localize('Files added')); ?>',
        no_file_chosen: '<?php echo e(localize('No file chosen')); ?>',
    };
    TT.baseUrl = '<?php echo e(\Request::root()); ?>';

    // on click delete confirmation -- outside footable
    function confirmDelete(thisLink) {
        var url = $(thisLink).data("href");
        $("#delete-modal").modal("show");
        $("#delete-link").attr("href", url);
    }

    // feather icon refresh
    function initFeather() {
        feather.replace();
    }
    initFeather();
</script>

<!-- media-manager scripts -->
<?php echo $__env->make('backend.inc.media-manager.uppyScripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    "use strict"
    $(function() {

        // footable js
        $(function() {
            $("table.tt-footable").footable({
                on: {
                    "ready.ft.table": function(e, ft) {
                        initTooltip();
                        deleteConfirmation();
                    },
                },
            });
        });

        //    tooltip
        function initTooltip() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
        initTooltip();

        // delete confirmation
        function deleteConfirmation() {
            $(".confirm-delete").click(function(e) {
                e.preventDefault();
                var url = $(this).data("href");
                $("#delete-modal").modal("show");
                $("#delete-link").attr("href", url);
            });
        }

        //    select2 js
        $(".select2").select2();
        $(".select2Max3").select2({
            maximumSelectionLength: 3
        });

        // modal select2
        function modalSelect2(parent = '.modalParentSelect2') {
            $('.modalSelect2').select2({
                dropdownParent: $(parent)
            });
        }
        modalSelect2();

        //    flatpickr 
        $(".date-picker").each(function(el) {
            var $this = $(this);
            var options = {
                dateFormat: 'm/d/Y'
            };

            var date = $this.data("date");
            if (date) {
                options.defaultDate = date;
            }

            $this.flatpickr(options);
        });



        $(".date-range-picker").each(function(el) {
            var $this = $(this);
            var options = {
                mode: "range",
                showMonths: 2,
                dateFormat: 'm/d/Y'
            };

            var start = $this.data("startdate");
            var end = $this.data("enddate");

            if (start && end) {
                options.defaultDate = [start, end];
            }

            $this.flatpickr(options);
        });

        // summernote
        $(".editor").each(function(el) {
            var $this = $(this);
            var buttons = $this.data("buttons");
            var minHeight = $this.data("min-height");
            var placeholder = $this.attr("placeholder");
            var format = $this.data("format");

            buttons = !buttons ? [
                    ["font", ["bold", "underline", "italic", "clear"]],
                    ['fontname', ['fontname']],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["style", ["style"]],
                    ['fontsize', ['fontsize']],
                    ["color", ["color"]],
                    ["insert", ["link", "picture", "video"]],
                    ["view", ["undo", "redo"]],
                ] :
                buttons;
            placeholder = !placeholder ? "" : placeholder;
            minHeight = !minHeight ? 150 : minHeight;
            format = typeof format == "undefined" ? false : format;

            $this.summernote({
                toolbar: buttons,
                placeholder: placeholder,
                height: minHeight,
                codeviewFilter: false,
                codeviewIframeFilter: true,
                disableDragAndDrop: true,
                callbacks: {

                },
            });

            var nativeHtmlBuilderFunc = $this.summernote(
                "module",
                "videoDialog"
            ).createVideoNode;

            $this.summernote("module", "videoDialog").createVideoNode = function(url) {
                var wrap = $(
                    '<div class="embed-responsive embed-responsive-16by9"></div>'
                );
                var html = nativeHtmlBuilderFunc(url);
                html = $(html).addClass("embed-responsive-item");
                return wrap.append(html)[0];
            };
        });

        // add more
        $('[data-toggle="add-more"]').each(function() {
            var $this = $(this);
            var content = $this.data("content");
            var target = $this.data("target");

            $this.on("click", function(e) {
                e.preventDefault();
                $(target).append(content);
                $('.select2').select2();
            });
        });

        // remove parent
        $(document).on(
            "click",
            '[data-toggle="remove-parent"]',
            function() {
                var $this = $(this);
                var parent = $this.data("parent");
                $this.closest(parent).remove();
            }
        );

        // language flag select2
        $(".country-flag-select").select2({
            templateResult: countryCodeFlag,
            templateSelection: countryCodeFlag,
            escapeMarkup: function(m) {
                return m;
            },
        });

        function countryCodeFlag(state) {
            var flagName = $(state.element).data("flag");
            if (!flagName) return state.text;
            return (
                "<div class='d-flex align-items-center'><img class='flag me-2' src='" + flagName +
                "' height='14' />" + state.text + "</div>"
            );
        }
    })
</script>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/scripts.blade.php ENDPATH**/ ?>