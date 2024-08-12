@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.client.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->hasPermission('clients-create'))
                    <a href="{{ route('client.create') }}"> <button type="button"
                            class="btn btn-primary">@lang('site.new')</button></a>
                    @else
                    <button type="button" class="btn btn-primary  disabled">@lang('site.new')</button>
                    @endif
                    @include('Dashboard.client.includes.search')
                </div>
                @if ($clients->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>

                                <th>@lang('site.phone')</th>

                                <th>@lang('site.address')</th>
                                <th>@lang('site.orders')</th>
                                <th>@lang('site.create_order')</th>
                                <th>@lang('site.cart')</th>

                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('orders-read'))
                                    <a href="{{ route('order.index',['client_id'=>$client->id]) }}"><button
                                            type="button"
                                            class="btn btn-primary">@lang('site.orders')</button></a>
                                    @else
                                    <button type="button"
                                        class="btn btn-primary disabled">@lang('site.create_order')</button>
                                    @endif

                                </td>

                                <td>
                                    @if (auth()->user()->hasPermission('orders-create'))
                                    <a href="{{ route('client.order.create',['client'=>$client->id]) }}"><button
                                            type="button"
                                            class="btn btn-primary">@lang('site.create_order')</button></a>
                                    @else
                                    <button type="button"
                                        class="btn btn-primary disabled">@lang('site.create_order')</button>
                                    @endif

                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('orders-read'))
                                    @if ($client->CheckCountOfCartsToClient())
                                    <a href="{{ route('client.cart.index',['client'=>$client->id]) }}"><button
                                            type="button" class="btn btn-success">@lang('site.cart')</button></a>
                                    @else
                                    <button type="button"
                                        class="btn btn-success disabled">@lang('site.not_found')</button>
                                    @endif
                                    @else
                                    <button type="button" class="btn btn-success disabled">@lang('site.cart')</button>
                                    @endif

                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('clients-update'))
                                    <a href="{{ route('client.edit',['client'=>$client->id]) }}"><button type="button"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-secondary disabled"><i
                                            class="fas fa-edit"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('clients-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('Dashboard.client.includes.deleteModelclient')
                                    @else
                                    <button type="button" class="btn btn-danger disabled"><i
                                            class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
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
