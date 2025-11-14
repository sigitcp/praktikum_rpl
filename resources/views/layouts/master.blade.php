@include('layouts.header')
<div id="wrapper">
    @include('layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layouts.navbar')
            @yield('container')
        </div>
    </div>
</div>

@include('layouts.footer')