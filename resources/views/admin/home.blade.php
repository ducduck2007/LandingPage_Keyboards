<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/menu1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu2.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/word-list.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="scripts/word-list.js" defer></script>
    <script src="scripts/script.js" defer></script>
    <title>QUẢN TRỊ LANDING PAGE KEYBOARDS</title>
</head>

<body>
    @include('admin.sub.nav')
    @include('admin.sub.left-menu')

    <div class="content">
        @include('admin.sub.hello')
    </div>
</body>

</html>
