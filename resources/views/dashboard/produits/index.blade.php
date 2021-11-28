@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>{{ __('Liste des produits') }}</div>
                <div class="card-body">
                    <div class="row"> 
                        <a href="{{ route('produits.create') }}" class="btn btn-outline-primary">{{ __('Ajouter Produit') }}</a>
                    </div>
                    <br>
                    <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                        <th>Auteur</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégory</th>
                        <th>Image</th>
                        <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $product)
                        <tr>
                            <td><strong>{{ $product->user->name }}</strong></td>
                            <td><strong>{{ $product->title }}</strong></td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            
                            <td>
                                <span class="{{ $product->category->class ?? ''}}">
                                    {{ $product->category->title ?? '' }}
                                </span>
                            </td>


                            <td><img src="assets/images/produits/{{ $product->image }}" width="50px"></td>
                            <td>
                            <form action="{{ route('produits.destroy', $product->id ) }}" method="POST">
                                <a href="{{ url('/produits/' . $product->id . '/edit') }}" class="btn btn-info">Editer</a>
                                <a href="{{ url('/produits/' . $product->id) }}" class="btn btn-warning">Details</a>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Suppr.</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $produits->links() }}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
 
@section('javascript')

@endsection
