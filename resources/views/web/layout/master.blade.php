
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="Need more sales & growth!!  Webpico is the data driven Digital marketing agency offering SEO, SMM, Web development, And Facebook Ads to grow your business!">
    <link rel="stylesheet" href="{{ asset('src/css/output.css') }}">
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.svg') }}" type="image/x-icon">
    <!-- Slick Slideer -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/css/slick-theme.css') }}" />
    @yield('need-css')
</head>

<body>
    <!-- Navbar -->
     @include('web.assets.navbar')





   @yield('content')



    <!-- Testimonial -->
@yield('testimonial')
    <!-- Testimonial End -->

    <!-- New Article -->
@yield('latest')
    <!-- New Article End -->

    <!-- Footer -->
@include('web.assets.footer')
    <!-- Footer End-->
</body>

</html>
    <!-- Footer End-->

    <!-- Script -->
    <script type="text/javascript" src="{{ asset('src/script/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/script/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/script/slick.min.js') }}"></script>
    <script src="{{ asset('src/script/script.js') }}"></script>
    <script>
        $('.center').slick({
            centerMode: true,
            arrows: false,
            centerPadding: '350px',
            slidesToShow: 1,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
    @yield('need-js')
</body>

</html>
