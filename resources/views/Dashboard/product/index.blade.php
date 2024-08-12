@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.product.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->hasPermission('products-create'))
                    <a href="{{ route('product.create') }}"> <button type="button"
                            class="btn btn-primary">@lang('site.new')</button></a>
                    @else
                    <button type="button" class="btn btn-primary  disabled">@lang('site.new')</button>

                    @endif
                    @include('Dashboard.product.includes.search')
                </div>
                @if ($products->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    @include('Dashboard.includes.displayErrors')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.category')</th>
                                <th>@lang('site.price')</th>
                                <th>@lang('site.selling_price')</th>
                                <th>@lang('site.gain')%</th>
                                <th>@lang('site.qty')</th>
                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$product->image) }}" alt="" style="width: 100px; height: 100px; border: 1px solid black;" >
                                </td>
                                <td>
                                    {{ $product->category->name }}
                                </td>
                                <td>
                                    {{ $product->price .'LE' }}
                                </td>
                                <td>
                                    {{ $product->selling_price.'LE' }}
                                </td>
                                <td>
                                    {{ $product->gain().'%'}}
                                </td>
                                <td>
                                    {{ $product->qty }}
                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('products-update'))
                                    <a href="{{ route('product.edit',['product'=>$product->id]) }}"><button type="button"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-secondary disabled"><i
                                            class="fas fa-edit"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('products-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('Dashboard.product.includes.deleteModel')

                                    @else
                                    <button type="button" class="btn btn-danger disabled"><i
                                            class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
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
