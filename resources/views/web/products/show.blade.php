@extends('layout.app')

@section('body-content')
    <div class="container my-2  ">
        <div class="columns ">
            <div class="column ">
                <a href="{{ route('products.index') }}" class="button is-link">Products</a>
            </div>
        </div>
    </div>
    <div class="mt-3 container">
        <div class="columns is-desktop">
            <div class="column is-half is-offset-one-quarter ">
                <div class="title is-size-3 has-text-light has-background-link-dark has-text-centered"> {{ strtoupper($product->descripcion) }} </div>
                <div class="content is-size-5">
                    <ul>
                        <li>Id: # {{ $product->id }}</li>
                        <li>Type: {{ $product->tipo }}</li>
                        <li>Price: {{ $product->costo }}</li>
                        <li>Stock: {{ $product->cantidad }}</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
