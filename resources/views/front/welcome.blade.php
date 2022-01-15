@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($products->chunk(3) as $chunk)
    <div class="row match-height">
        @foreach ($chunk as $product)
        <div class="col-lg-4 col-md-12">
          <div class="card text-center">
            <div class="card-content">
              <img class="card-img-top img-fluid" src=""
              alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Formal Shoes</h4>
                <p class="card-text">Some quick example text.</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <span class="btn btn-outline-blue-grey">$159</span>
                  <button type="button" class="btn btn-outline-blue-grey">Shop Now <i class="ft-shopping-cart"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
@endforeach
</div>
@endsection
