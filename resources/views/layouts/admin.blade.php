@includeIf('includes.header')
@includeIf('includes.topbar')
@includeIf('includes.menubar')

    @yield('admin_content')
    <div class="page-footer">
        <div class="container">
            <p class="no-s">2015 &copy; Modern by Steelcoders.</p>
        </div>
    </div>
</div><!-- Page Inner -->
@includeIf('includes.footer')