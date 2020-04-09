<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>OMD SYSTEM</title>
    <meta content="Developer" name=" Muaadh Esmail Qaid Almrham" />
    @include('layouts.shared.head')

</head>
    <body>

    <div id="wrapper" id="app">

        @include('layouts.shared.header')
        @include('layouts.shared.sidebar')

        <div class="content-page">
            <div class="content">
                <div class="container-fluid my-5">

                    @yield('content')

                </div>
            </div>

            @include('layouts.shared.footer')
        </div>
    </div>

    @include('layouts.shared.footer-script')
</html>