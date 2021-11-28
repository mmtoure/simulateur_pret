@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Note: {{ $category->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('logout') }}"> @csrf<button class="btn btn-primary">{{ __('Logout') }}</button></form> 
                        <br>
                        <h4>Auteur:</h4>
                        <p> {{ $category->user->name }}</p>
                        <h4>Title:</h4>
                        <p> {{ $category->title }}</p>
                        <h4>Description:</h4> 
                        <p>{{ $category->description }}</p>
                     
                       
                        <a href="{{ route('categories.index') }}" class="btn btn-block btn-primary">{{ __('Retour') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection