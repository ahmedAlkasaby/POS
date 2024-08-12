@extends('Dashboard.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.create_order')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.create_order')</a></li>
                <li class="breadcrumb-item active">create</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content-body')
<div class="card card-primary">
    @include('Dashboard.includes.success')


    @include('Dashboard.includes.displayErrors')


    <form action="{{ route('client.order.store',['client'=>$client->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">@lang('site.city') </label>
                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.area') </label>
                <input type="text" class="form-control" name="area" value="{{ old('area') }}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.street') </label>
                <input type="text" class="form-control" name="street" value="{{ old('street') }}">
            </div>

           
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@lang('site.place_order')</button>
        </div>
    </form>
</div>
@endsection

@section('js')

<script src="{{ asset('js/flashMessage.js') }}"></script>

@endsection
