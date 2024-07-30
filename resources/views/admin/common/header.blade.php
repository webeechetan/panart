    <!-- Script Start -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script> -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/PACE/pace.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  <!-- Script End -->

  <!-- Stylesheet Start -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/pace/pace.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Stylesheet End -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
    Pace.restart()
    })
    $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
    })
  </script>