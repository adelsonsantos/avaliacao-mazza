<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ URL::to('/') }}/images/logo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Mazzatech</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>


<script>
    $(function($) {
        let url = window.location.href;
        $('li a').removeClass('active');
        $('li a').each(function() {
            if (this.href === url) {
            $(this).closest('li').addClass('active');
            $(this).css("background-color", "#c34a51");
            $(this).css("color", "#fff");
            }
        });
});


</script>