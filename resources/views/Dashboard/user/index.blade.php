@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.user.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->hasPermission('users-create'))
                    <a href="{{ route('user.create') }}"> <button type="button"
                            class="btn btn-primary">@lang('site.new')</button></a>
                    @else
                    <button type="button" class="btn btn-primary  disabled">@lang('site.new')</button>
                    @endif
                   @include('Dashboard.user.includes.search')
                </div>
                @if ($users->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>

                                <th>@lang('site.email')</th>

                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('users-update'))
                                    <a href="{{ route('user.edit',['user'=>$user->id]) }}"><button type="button"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-secondary disabled"><i
                                            class="fas fa-edit"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('users-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                   @include('Dashboard.user.includes.deleteModelUser')
                                    @else
                                    <button type="button" class="btn btn-danger disabled"><i
                                            class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
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
