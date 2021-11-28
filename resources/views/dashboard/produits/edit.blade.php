@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $product->title }}</div>
                <div class="card-body">
                    <form method="POST" action="/produits/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col">
                                <label>Catégorie</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $cat)
                                        @if( $cat->id == $product->category_id )
                                            <option value="{{ $cat->id }}" selected="true">{{ $cat->title }}</option>
                                        @else
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" value="{{ $product->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Description</label>
                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required>{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Prix</label>
                                <input class="form-control" type="text" placeholder="{{ __('Prix') }}" name="price" value="{{ $product->price }}" required autofocus>
                            </div>
                        </div>

                

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <img src="/assets/images/produits/{{ $product->image }}" width="300px">
                            </div>
                        </div>

                    
                        <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('produits.index') }}" class="btn btn-block btn-primary">{{ __('Retour') }}</a> 
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection