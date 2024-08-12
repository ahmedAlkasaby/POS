@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.order.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  
                    @include('Dashboard.order.includes.filter')
                </div>


                @if ($orders->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.client')</th>
                                <th>@lang('site.user')</th>
                                <th>@lang('site.status')</th>
                                <th>@lang('site.payment_status')</th>
                                <th>@lang('site.payment_method')</th>
                                <th>@lang('site.total_price')</th>
                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>

                                <td>
                                    @if ($order->CheckOrderClientOrUser()=='client')
                                    {{ $order->client->name }}
                                    @else
                                    {{ 'NULL' }}
                                    @endif

                                </td>
                                <td>
                                    @if ($order->CheckOrderClientOrUser()=='user')
                                    {{ $order->user->name }}
                                    @else
                                    {{ 'NULL' }}
                                    @endif
                                </td>

                                <td>{{ $order->status }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->payment_method}}</td>
                                <td>{{ $order->total_price .'LE'}}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('orders-update'))
                                    <a href="{{ route('order.edit',['order'=>$order->id]) }}"><button type="button"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-secondary disabled"><i
                                            class="fas fa-edit"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('orders-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('Dashboard.order.includes.deleteModel')

                                    @else
                                    <button type="button" class="btn btn-danger disabled"><i
                                            class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
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
