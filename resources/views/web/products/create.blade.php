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
                <div class="title has-text-white has-text-centered"> New Product </div>
            </div>
        </div>
        <div class="columns ">
            <div class="column is-half is-offset-one-quarter ">
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="field">
                                <label class="label">Description</label>
                                <div class="control">
                                    <input class="input" type="text" name="descripcion">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Type</label>
                                <div class="select" >
                                        <select name="tipo">
                                          <option>--</option>
                                          <option value="Audio">Audio</option>
                                          <option value="Video">Video</option>
                                          <option value="Juegos">Juegos</option>
                                          <option value="Accesorio">Accesorio</option>
                                          <option value="Extensión">Extensión</option>
                                        </select>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Price</label>
                                <div class="control">
                                    <input class="input" type="number" step="0.01" name="costo">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Cantidad</label>
                                <div class="control">
                                    <input class="input" type="number" step="1" name="cantidad">
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                  <button type="submit" class="button is-link">Submit</button>
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
