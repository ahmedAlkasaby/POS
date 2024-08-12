@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.cart.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if ($carts->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.product')</th>
                                <th>@lang('site.image')</th>

                                <th>@lang('site.qty')</th>
                                <th>@lang('site.selling_price')</th>
                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            $total=0;
                            @endphp
                            @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cart->product->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$cart->product->image) }}" alt=""
                                        style="width: 50px; height: 50px; border: 1px solid black;">
                                </td>
                                <td>{{ $cart->qty }}</td>
                                <td>{{ $cart->sub_total }}</td>
                                @php
                                    $total+=($cart->sub_total);
                                @endphp
                                <td>
                                    @if (auth()->user()->hasPermission('orders-update'))
                                    <a
                                        href="{{ route('client.cart.update',['cart'=>$cart->id,'client'=>$client->id,'status'=>'plus']) }}"><button
                                            type="button" class="btn btn-primary "><i
                                                class="fas fa-plus"></i></button></a>
                                    <a
                                        href="{{ route('client.cart.update',['cart'=>$cart->id,'client'=>$client->id,'status'=>'minus']) }}"><button
                                            type="button" class="btn btn-success "><i
                                                class="fas fa-minus"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-primary disabled"><i
                                            class="fas fa-plus"></i></button>
                                    <button type="button" class="btn btn-success disabled"><i
                                            class="fas fa-minus"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('orders-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-danger disabled"></button>
                                    @endif

                                    @include('Dashboard.cart.includes.deleteModel')
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>@lang('site.total')</th>
                            <th>=</th>
                            <th>{{ $total }}</th>
                            <th>
                                <a href="{{ route('checkout',['id'=>$client->id]) }}"><button type="button" class="btn btn-info" style="width: 100%">@lang('site.checkout')</button></a>
                            </th>


                        </tfoot>
                    </table>
                    {{ $carts->links() }}
                </div>
                @else
                <h1>@lang('site.not_found')</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/flashMessage.js') }}"></script>
@endsection
