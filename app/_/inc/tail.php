

        <!-- build:js(app) /_/js/main.js -->
        <script src="/_/bower_components/jquery/jquery.js"></script>
        <script src="/_/js/functions.js"></script>
        <script src="/_/js/validation.js"></script>
        <!-- endbuild -->

        <!-- build:js(app) /_/js/bootstrap.js -->
        <script src="/_/bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="/_/bower_components/typehead.js/dist/typeahead.bundle.js"></script>
        <!-- endbuild -->

<?=(($loginError)?'<script type="text/javascript">$(\'#loginModal\').modal();</script>':'');?>

<!-- build:remove:dist -->
<script src="//ccc:1025/livereload.js"></script>
<!-- /build -->
