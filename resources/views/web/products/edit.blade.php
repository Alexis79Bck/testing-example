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
            <div class="column has-background-link">
                <div class="title has-text-white has-text-centered"> Edit Product </div>
            </div>
        </div>
        <div class="columns ">
            <div class="column is-half is-offset-one-quarter ">
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('products.update', [$product]) }}" method="PATCH">
                            @csrf
                            <div class="field">
                                <label class="label">Id. # {{ $product->id }}</label>
                                 
                            </div>
                            <div class="field">
                                <label class="label">Description</label>
                                <div class="control">
                                    <input class="input" type="text" name="descripcion" value="{{ $product->descripcion }}">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Type</label>
                                <div class="select" >
                                        <select name="tipo" value="{{ $product->tipo }}">
                                          <option>--</option>
                                          <option value="Audio" {{ $product->tipo == 'Audio' ? 'selected' : null }}>Audio</option>
                                          <option value="Video" {{ $product->tipo == 'Video' ? 'selected' : null }}>Video</option>
                                          <option value="Juegos" {{ $product->tipo == 'Juegos' ? 'selected' : null }}>Juegos</option>
                                          <option value="Accesorio" {{ $product->tipo == 'Accesorio' ? 'selected' : null }}>Accesorio</option>
                                          <option value="Extensión" {{ $product->tipo == 'Extensión' ? 'selected' : null }}>Extensión</option>
                                        </select>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Price</label>
                                <div class="control">
                                    <input class="input" type="number" step="0.01" name="costo" value="{{ $product->costo}}">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Quantity</label>
                                <div class="control">
                                    <input class="input" type="number" step="1" name="cantidad" value="{{ $product->cantidad}}">
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">                                     
                                   <button type="submit" class="button is-link">Update</button> 
                                </div>
                                <div class="control">
                                  <a href="{{ route('products.index') }}" class="button is-secondary">Cancel</a>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
