@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ __('Create Produit') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('produits.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label>Title</label>
                            <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                        </div>

                        <div class="form-group row">
                            <label>Description</label>
                            <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required></textarea>
                        </div>

                        <div class="form-group row">
                            <label>Prix</label>
                            <input class="form-control" type="text" placeholder="{{ __('Prix') }}" name="price" required autofocus>
                        </div>

                        <div class="form-group row">
                            <label>Catégorie</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label>Image</label>
                            <input class="form-control" type="file"  name="image" required autofocus>
                        </div>


                        <button class="btn btn-block btn-success" type="submit">{{ __('Ajouter') }}</button>
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