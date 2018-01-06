    
        <hr/>

        <div class="container">
            &copy; {{ date('Y') }}. DialogBox.
            <br/>
        </div>

    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        $(function () {
            // Navigation active
            $('ul.navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li').addClass('active');
        });
    </script>
    <script src="/js/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".dropdown-hover").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-hover-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });     
    </script>
    @yield('scripts')

</body>
</html>
