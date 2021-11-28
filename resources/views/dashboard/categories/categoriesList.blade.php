@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Catégories') }}</div>
                    <div class="card-body">
                      @include('flash::message')
                        <div class="row"> 
                          <a href="{{ route('categories.create') }}" class="btn btn-primary m-2">{{ __('Ajouter Catégorie') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Auteur</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                            <tr>
                              <td><strong>{{ $category->user->name }}</strong></td>
                              <td><strong>{{ $category->title }}</strong></td>
                              <td>{{ $category->description }}</td>
                              <td>
                                <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                                  <a href="{{ url('/categories/' . $category->id . '/edit') }}" class="btn btn-info">Editer</a>
                                  <a href="{{ url('/categories/' . $category->id) }}" class="btn btn-warning">details</a>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Suppr.</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $categories->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

