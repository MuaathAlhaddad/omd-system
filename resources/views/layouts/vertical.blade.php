<!DOCTYPE html>
<html lang="en">

<head>
    <title>OMD SYSTEM</title>
    
    @include('layouts.shared.head')

</head>
    <body class="bg-light">

    <div id="wrapper" id="app">

        @include('layouts.shared.header')
        @include('layouts.shared.sidebar')

        <div class="content-page">
            <div class="content">
                <div class="container-fluid py-5">

                    @yield('content')

                </div>
            </div>

            @include('layouts.shared.footer')
        </div>
    </div>

    @include('layouts.shared.footer-script')
</html>