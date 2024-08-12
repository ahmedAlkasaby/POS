@extends('Dashboard.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.edit_order')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.edit_order')</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if ($items->count() > 0)
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.product')</th>
                                <th>@lang('site.image')</th>

                                <th>@lang('site.qty')</th>
                                <th>@lang('site.selling_price')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            $total=0;
                            @endphp
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$item->product->image) }}" alt=""
                                        style="width: 50px; height: 50px; border: 1px solid black;">
                                </td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->qty*$item->product->selling_price }}</td>
                                @php
                                    $total+=($item->qty*$item->product->selling_price);
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $items->links() }}
                </div>
                @else
                <h1>@lang('site.not_found')</h1>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    @include('Dashboard.includes.success')


    @include('Dashboard.includes.displayErrors')


    <form action="{{ route('order.update',['order'=>$order->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
            @if ($order->CheckOrderClientOrUser()=='client')
            <div class="form-group">
                <label>@lang('site.client')</label>
                <select class="form-control" name="client_id" >
                    <option value="">@lang('site.client')</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}"  {{ $client->id == $order->client_id ? 'selected' : '' }}>{{ $order->client->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @if ($order->CheckOrderClientOrUser()=='user')
            <div class="form-group">
                <label for="">@lang('site.user') </label>
                <input type="text" class="form-control" name="user_id" value="{{$order->user->name}}" readonly>
            </div>
            @endif
            <div class="form-group">
                <label>@lang('site.status')</label>
                <select class="form-control" name="status" >
                    <option value="new"  {{ $order->status=='new'? 'selected' : '' }}>@lang('site.new')</option>
                    <option value="processing"  {{ $order->status=='processing'? 'selected' : '' }}>@lang('site.processing')</option>
                    <option value="shipped"  {{ $order->status=='shipped'? 'selected' : '' }}>@lang('site.shipped')</option>
                    <option value="delivered"  {{ $order->status=='delivered'? 'selected' : '' }}>@lang('site.delivered')</option>
                    <option value="canceled"  {{ $order->status=='canceled'? 'selected' : '' }}>@lang('site.canceled')</option>
                </select>
            </div>
            <div class="form-group">
                <label>@lang('site.payment_status')</label>
                <select class="form-control" name="payment_status" >
                    <option value="waiting"  {{ $order->payment_status=='waiting'? 'selected' : '' }}>@lang('site.waiting')</option>
                    <option value="success"  {{ $order->payment_status=='success'? 'selected' : '' }}>@lang('site.success')</option>
                    <option value="failed"  {{ $order->payment_status=='failed'? 'selected' : '' }}>@lang('site.failed')</option>
                </select>
            </div>
            <div class="form-group">
                <label>@lang('site.payment_method')</label>
                <select class="form-control" name="payment_method" >
                    <option value="cash"  {{ $order->payment_status=='cash'? 'selected' : '' }}>@lang('site.cash')</option>
                    <option value="stripe"  {{ $order->payment_status=='stripe'? 'selected' : '' }}>@lang('site.stripe')</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">@lang('site.selling_price') </label>
                <input type="number" class="form-control" name="total_price" value="{{ $order->total_price }}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.city') </label>
                <input type="text" class="form-control" name="city" value="{{$order->location->city}}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.area') </label>
                <input type="text" class="form-control" name="area" value="{{ $order->location->area }}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.street') </label>
                <input type="text" class="form-control" name="street" value="{{ $order->location->street }}">
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
        </div>
    </form>
</div>

@endsection

@section('js')

<script src="{{ asset('js/flashMessage.js') }}"></script>

@endsection
