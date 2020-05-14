
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('cork/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('cork/js/libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('cork/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('cork/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('cork/js/app.js') }}"></script>
<script src="{{ asset('cork/plugins/highlight/highlight.pack.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('cork/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@if($title == 'Dashboard')
<script src="{{ asset('cork/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('cork/js/dashboard/dash_2.js') }}"></script>
@elseif($title == 'Article')
<script src="{{ asset('cork/plugins/editors/quill/quill.js') }}"></script>
<script src="{{ asset('cork/plugins/editors/quill/custom-quill.js') }}"></script>
<script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endif
<!-- END PAGE LEVEL SCRIPTS -->