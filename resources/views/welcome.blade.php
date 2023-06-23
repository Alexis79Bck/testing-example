@extends('layout.app')

@section('body-content')
<div class="mt-3 container is-max-width">
    <div class="columns">
        <div class="column has-background-primary">
            <div class="title is-size-1 has-text-link has-text-centered"> Tutorial Básico de Testing con Laravel</div>
        </div>
    </div>
    <div class="columns ">
        <div class="column ">
            <a href="{{ route('products.index')}}" class="button">Products</a>
        </div>
    </div>
</div>
@endsection
 