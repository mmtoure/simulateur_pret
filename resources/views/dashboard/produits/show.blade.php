@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ __('Detail') }}: {{ $product->title }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('logout') }}"> @csrf<button class="btn btn-primary">{{ __('Logout') }}</button></form> 
                    <br>
                    <h4>Auteur:</h4>
                    <p> {{ $product->user->name }}</p>
                    <h4>Title:</h4>
                    <p> {{ $product->title }}</p>
                    <h4>Description:</h4> 
                    <p>{{ $product->description }}</p>
                    <h4> Catégorie: </h4>
                    <p>
                        <span class="{{ $product->category->class }}">
                          {{ $product->category->title }}
                        </span>
                    </p>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <img src="/assets/images/produits/{{ $product->image }}" width="500px">
                        </div>
                    </div>
                 
                    <a href="{{ route('produits.index') }}" class="btn btn-block btn-primary">{{ __('Retour') }}</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection