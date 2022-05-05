<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Sign In | Looper - Bootstrap 4 Admin Theme </title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="https://uselooper.com">
    <meta property="og:url" content="https://uselooper.com">
    <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
    <script type="application/ld+json">
    {
        "name": "Looper - Bootstrap 4 Admin Theme",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author": {
            "@type": "Person",
            "name": "Beni Arisandi"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Sign In",
        "@context": "http://schema.org"
    }
    </script><!-- End SEO tag -->
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="admin/apple-touch-icon.png">
    <link rel="shortcut icon" href="admin/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="admin/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{asset('admin/stylesheets/theme.min.css')}}" data-skin="default">
    <link rel="stylesheet" href="{{asset('admin/stylesheets/theme-dark.min.css')}}" data-skin="dark">
    <link rel="stylesheet" href="{{asset('admin/stylesheets/custom.css')}}">
    <script>
    var skin = localStorage.getItem('skin') || 'default';
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add loading class to html immediately
    document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
</head>

<body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">

        <header id="auth-header" class="auth-header"
            style="background-image: url(admin/images/illustration/img-1.png);">
            <h1>
                <img src="http://127.0.0.1:8000/mobile/assets/img/logo.png"  alt="">
                </svg> <span class="sr-only">Sign In</span>
            </h1>
            <p> Don't have a account? <a href="auth-signup.html">Create One</a>
            </p>
        </header><!-- form -->


        @yield('content')


              <!-- copyright -->
      <footer class="auth-footer"> © 2018 All Rights Reserved. <a href="#">Privacy</a> and <a href="#">Terms</a>
      </footer>


    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{asset('admin/vendor/particles.js/particles.js')}}"></script>
    <script>
    /**
     * Keep in mind that your scripts may not always be executed after the theme is completely ready,
     * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
     */
    $(document).on('theme:init', () => {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', 'admin/javascript/pages/particles.json');
    })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{asset('')}}admin/javascript/theme.js"></script> <!-- END THEME JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-116692175-1');
    </script>
</body>

</html>