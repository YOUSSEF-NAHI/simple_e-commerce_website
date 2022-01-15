@extends('layouts.app')


@section('content')


@if ($userCart)
    <div style="padding-top: 30px">     
        <table class="table table-bordered ">
            <thead>
                <tr class="table-active">
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Product Name</th>
                <th scope="col" class="text-center">Product Quantity</th>
                <th scope="col" class="text-center">Product Price</th>
                <th scope="col" class="text-center">Total Price</th>
                <th scope="col" class="text-center">Delet Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userCart->commands as $command )
                    <tr>
                        <th scope="row" class="text-center"> 1 </th>
                        <td class="text-center">
                            {{ $command->product->name }}
                        </td>
                        <td class="text-center">
                            @if (true)
                                <a href="#" class="btn disabled" style="margin-right: 30px"><i class="fas fa-minus-square"></i></a>
                            @else
                                <a href="/decreaseProduct/{{ $command->product->id }}" class="btn" style="margin-right: 30px"><i class="fas fa-minus-square"></i></a>
                            @endif

                            {{ $command->quantity }} 

                            <a href="/increaseProduct/{{ $command->product->id }}" class="btn" style="margin-left: 30px"><i class="fas fa-plus-square"></i></a>
                        </td>
                        <td class="text-center"> {{ $command->product->price }} </td>
                        <td class="text-center"> {{ $command->totalPrice }} </td>
                        <td class="text-center"> <a href="/deleteProduct/{{ $command->product->id }}" class="btn btn-danger">delete <i class="fas fa-trash-alt"></i></a></td>
                    </tr>  
                @endforeach

                <tr class="table-primary">
                    <td colspan="4" style="font-weight: bold">Total Price</td>
                    <td style="font-weight: bold" class="text-center "> {{ $userCart->totalPrice ?? 4 }} </td>
                </tr>
    
            </tbody>
        </table>
    </div>

    <div class="text-center">
    <a href="/checout" class="btn btn-success" style="width: 200px">Checkout</a>
    </div> 
@else
    
@endif






  
{{-- {{else}}

{{#if hasCart}}

<h1 class="text-center" style="padding-top: 200px">your Shopping cart is expired</h1>

{{else}}

<h1 class="text-center" style="padding-top: 200px">your Shopping cart is empty</h1>
{{/if}}

{{/if}} --}}






    
@endsection