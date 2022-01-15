@extends('layouts.app')

@section('content')
<div class="container text-center">
   
    <div class="row ">
      @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card text-center " style="width: 18rem;">
            <div class="card-content">
                <img class="card-img-top img-fluid" style="height: 200px; max-width: 100px;"  src="{{asset('images/'.$product->image)}}"
                alt="Card image cap">
              
              <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="card-text">{{$product->numberOfSIM}} | {{$product->storageCapacity}} Gb | 
                  cameraResolution : {{$product->cameraResolution}} | displaySize : {{$product->cameraResolution}} 
                </p>

                <div class="btn-group" role="group" aria-label="Basic example">
                  <span class="btn btn-outline-secondary">{{$product->price}} Dr</span>
                  <a class="btn btn-outline-secondary" href="{{ route('addToCart', $product->id) }}">Shop Now <i class="ft-shopping-cart"></i></a> 
                </div>

              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

</div>
@endsection
