<div class="menu">
    <nav>
        <div class="nav-wrapper blue-grey darken-4">
            <div class="container" id="menu">
                <a href="/" class="brand-logo">@include('_includes.title')</a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    @include('_includes.menu_url')
                </ul>
                <ul class="side-nav" id="mobile">
                    @include('_includes.menu_url')
                </ul>
            </div>
        </div>
    </nav>
</div>