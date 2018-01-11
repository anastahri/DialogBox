    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }}. DialogBox.</strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ url('/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ url('/js/bootstrap.min.js') }}" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ url('/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ url('/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ url('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('/plugins/knob/jquery.knob.js') }}" type="text/javascript') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ url('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ url('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ url('/plugins/iCheck/icheck.min.js" type="text/javascript') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ url('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ url('/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('/dist/js/demo.js') }}" type="text/javascript"></script>
    
    @yield('scripts')

  </body>
</html>