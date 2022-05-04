<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Quang Group</title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <link rel="icon" type="image/png" href="{{ asset('mobile/assets/img/favicon.png')}}" sizes="32x32">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="PWA Splash">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mobile/assets/img/icon/192x192.png')}}">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-640x1136.png')}}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-750x1294.png')}}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-1242x2148.png')}}" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-1125x2436.png')}}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-1536x2048.png')}}" media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-1668x2224.png')}}" media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('mobile/assets/img/splash/launch-2048x2732.png')}}" media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">

    <link rel="stylesheet" href="{{ asset('mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('mobile/assets/css/custom.css')}}">
    <link rel="manifest" href="{{ asset('manifest.json')}}">
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
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker
            .register('/service-worker.js')
            .then(function(registration) {
            console.log(
                'Service Worker registration successful with scope: ',
                registration.scope
            );
            })
            .catch(function(err) {
            console.log('Service Worker registration failed: ', err);
            });
        }
    </script>
</body>
</html>