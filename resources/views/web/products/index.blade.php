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

<body class="antialiased">
    <div class="mt-3 container is-max-width">
        <div class="columns">
            <div class="column has-background-primary">
                <div class="title has-text-centered"> Products Index </div>
            </div>
        </div>
        <div class="columns ">
            <div class="column is-full ">
                <table class="table is-bordered is-fullwidth">
                    <thead class="has-background-info-dark has-text-white">
                        <tr class="has-background-info-light">
                            <th class="has-text-link">ID</th>
                            <th class="has-text-link">Descripción</th>
                            <th class="has-text-link">Tipo</th>
                            <th class="has-text-link">Costo</th>
                            <th class="has-text-link">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->descripcion }}</td>
                                <td>{{ $product->tipo }}</td>
                                <td>{{ $product->costo }}</td>
                                <td>{{ $product->cantidad }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="title is-4 has-text-centered">
                                        No se encontró ningun producto.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
