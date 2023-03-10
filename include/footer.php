<footer class="d-flex justify-content-end">
    <span <?= $path = 'Log In' ? 'style="display: none;"' : '' ?>>Copyright © 2022 BY AK</span>
</footer>
<script defer src="../assets/js/app.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    <?php if (isset($_SESSION['message'])) {
    ?>
        const Toast = Swal.mixin({
            background: '#1e1e2d',
            color: '#F0F6FC',
            width: '25em',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: '<?= $_SESSION['icon']; ?>',
            title: '<?= $_SESSION['message']; ?>'
        })
    <?php
        unset($_SESSION['icon']);
        unset($_SESSION['message']);
    } ?>
</script>
<script>
    $(document).ready(function() {
        $('#Table').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify({
            tpl: {
                wrap: '<div id="PictureFileField" class="dropify-wrapper" style=" border-radius: 1em !important;background-color: #151521 !important;"></div>',
                preview: '<div id="PreviewFileField" class="dropify-preview"><span class="dropify-render"><img style="max-height: 100%;"/></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            },
            messages: {
                default: '<h6>Drag picture here</h6>',
                replace: 'Drag picture here or click to replace',
                remove: 'Remove',
                error: 'Sorry, the file size is too big',
            },
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm('Do you really want to delete "' + element.file.name + '" ?');
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify');
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
    });
</script>