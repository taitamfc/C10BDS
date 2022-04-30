<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('mobile/assets/img/favicon.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mobile/assets/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{ asset('mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('mobile/assets/css/custom.css')}}">
    <link rel="manifest" href="mobile/__manifest.json">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <style>
        .no-padding {
            padding: 0 !important;
        }
    </style>
</head>

<body class="bg-white">
    <div id="app"></div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>