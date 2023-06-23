@extends('layout.app')

@section('body-content')
    <div class="container my-2  ">
        <div class="columns ">
            <div class="column ">
                <a href="{{ route('home') }}" class="button is-link">Home</a>
            </div>
        </div>
    </div>
    <div class="mt-3 container ">
        <div class="columns is-desktop">
            <div class="column is-narrow">
                <div class="title"> List of Products </div>
            </div>
            <div class="column">
                <a href="{{ route('products.create') }}" class="button is-link"> + New </a>
            </div>
        </div>

        <div class="columns is-gapless">
            <div class="column is-full  ">
                <table class="table is-fullwidth is-bordered ">
                    <thead class="has-background-info-dark has-text-white">
                        <tr class="has-background-info-light">
                            <th class="has-text-link">ID</th>
                            <th class="has-text-link">Description</th>
                            <th class="has-text-link">Type</th>
                            <th class="has-text-link">Price</th>
                            <th class="has-text-link">Stock</th>
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
@endsection
