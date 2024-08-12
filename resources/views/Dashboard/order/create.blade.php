@extends('Dashboard.master')
@section('css')
<style>
</style>
@endsection
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.create_order')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.client_name')</a></li>
                <li class="breadcrumb-item active">{{ $client->name }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content-body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('site.categories')</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover">
                @include('Dashboard.includes.success')
                <tbody>
                    @foreach ($categories as $category)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr class="expandable-body d-none">
                        <td>
                            <div class="p-0" style="display: none;">
                                <table class="table table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.image')</th>

                                        <th>@lang('site.selling_price')</th>
                                        <th>@lang('site.qty')</th>
                                        <th>@lang('site.actions')</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach ($category->products as $product)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/'.$product->image) }}" alt=""
                                                    style="width: 50px; height: 50px; border: 1px solid black;">
                                            </td>
                                            <td>
                                                {{ $product->selling_price.'LE' }}
                                            </td>

                                            <td>
                                                {{ $product->qty }}
                                            </td>
                                            <td>

                                                <form class="product-form"
                                                    action="{{ route('client.cart.store',['client'=>$client->id]) }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    @if (auth()->user()->hasPermission('orders-create'))
                                                    @if ($product->checkProductInCartWithClient($client->id))
                                                    <button type="submit" class="btn btn-success disabled">+</button>

                                                    @else
                                                    <button type="submit"
                                                        class="btn btn-success add-to-cart-btn">+</button>
                                                    @endif
                                                    @else
                                                    <button type="submit"
                                                        class="btn btn-success add-to-cart-btn">+</button>

                                                    @endif

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @php
                                        $i=1;
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
@section('js')
<script src="{{ asset('js\cart.js') }}">
</script>
@endsection
