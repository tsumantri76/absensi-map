<!DOCTYPE html>
<html>
<head>
    @include('layouts.header')
    @stack('style')
</head>
<body>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
    @stack('script')
</body>
</html>