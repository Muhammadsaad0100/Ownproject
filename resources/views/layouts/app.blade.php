@include('layouts.header')
@include('layouts.navigation')
     @include('layouts.themes')
     @include('layouts.footerscript')
<div id="main-content">
    @yield('content')
</div>
@include('layouts.head')
