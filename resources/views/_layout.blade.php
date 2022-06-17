<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link href="/assets/css/all.css?v=5" rel="stylesheet">--}}
    <link href="/assets/css/all_ar.css?v=5" rel="stylesheet">
    <link href="/assets/css/style.css?v=8" rel="stylesheet">

    @yield('css')

    <title>@yield('title','WhatsApp')</title>
</head>
<body dir="rtl">
<header>
    <nav class="navbar navbar-expand-lg navbar-light header-color p-5">
        <div class="container-fluid">
            <a class="navbar-brand"href="/"><img alt="notfound" src="/assets/img/logo.png" width="50" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/add">إضافة أمر جديد</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>
<main>

@yield('content')
</main>

<footer>

</footer>

<script src="/assets/js/bootstrap.min.js"></script>

@yield('js')

</body>
</html>
