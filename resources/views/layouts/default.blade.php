<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Template</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- style --}}
    @include('includes.style')
    
    {{-- script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

    {{-- sidebar --}}
    @include('includes.sidebar')

    <div id="right-panel" class="right-panel">
        
    {{-- navbar  --}}
    @include('includes.navbar')

</head>

<body>

        <div class="content">

            {{-- content --}}
            @yield('content')

        </div>
        <div class="clearfix"></div>
    </div>

</body>
</html>
