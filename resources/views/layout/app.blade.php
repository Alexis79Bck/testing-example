<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bulma/bulma.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{!! asset('normalize/normalize.min.css') !!}">
</head>

<body class="container is-fullwidth">

    <div class="columns">
        <div class="column is-full">
            <main>
                @yield('body-content')
            </main>
        </div>
    </div>

</body>

</html>
