@extends('layouts.app')


@section('content')

<div class="container-lg mt-4">
    @include('front.includes.alerts.success')
    @include('front.includes.alerts.errors')
    @if ($userCart)
        @if ($userCart->products->count()>0)   
            <div class="table-responsive">
                <table class="table  " style="min-width:700px">
                    <thead>
                        <tr class="table-active">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Product Name</th>
                        <th scope="col" class="text-center">Product Quantity</th>
                        <th scope="col" class="text-center">Product Price</th>
                        <th scope="col" class="text-center">Total Price</th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userCart->products as $product )
                            <tr>
                                <th scope="row" class="text-center"> {{$loop->index+1}} </th>
                                <td class="text-center">
                                    {{ $product->name }}
                                </td>
                                <td class="text-center">
                                        
                                    @if ($product->demand->quantity < 2 )
                                        <a href="#" class="btn disabled " ><i class="fas fa-minus-square"></i></a>
                                    @else
                                        <a href="{{ route('decreaseProduct',$product->id)}}" class="btn text-primary"><i class="fas fa-minus-square"></i></a>
                                    @endif
                                    
                                    {{ $product->demand->quantity }} 
                                
                                    <a href="{{ route('increaseProduct',$product->id)}}" class="btn text-danger"><i class="fas fa-plus-square"></i></a>
                                </td>
                                <td class="text-center"> {{ $product->price }} </td>
                                <td class="text-center"> {{ $product->demand->totalPrice }} </td>
                                <td class="text-center"> <a href="{{ route('deleteProduct',$product->id)}}" class="btn btn-danger">delete <i class="fas fa-trash-alt"></i></a></td>
                            </tr>  
                        @endforeach

                        <tr class="table-primary">
                            <td colspan="4" style="font-weight: bold">Total Price</td>
                            <td style="font-weight: bold" class="text-center "> {{ $userCart->totalPrice }} </td>
                        </tr>
            
                    </tbody>
                </table>
            </div>
            
            <div class="text-center mt-3">
                <a href="{{ route('checkOut')}}" class="btn btn-success" style="width: 200px">Checkout</a>
            </div> 
        @else
            <h1 class="text-center" style="padding-top: 10%">your Shopping cart is expired</h1>
            <div class="text-center">
                <a href="{{ route('Welcome')}}" class="btn btn-success" style="width: 200px">go to products page</a>
            </div>
        @endif

    @else
        <h1 class="text-center" style="padding-top: 10%">your Shopping cart is empty</h1>
        <div class="text-center">
            <a href="{{ route('Welcome')}}" class="btn btn-success" style="width: 200px">go to products page</a>
        </div>
    @endif

</div>
    
@endsection