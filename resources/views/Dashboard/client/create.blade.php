@extends('Dashboard.master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.create_client')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.create_client')</a></li>
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


    <form action="{{ route('client.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">@lang('site.name')  </label>
                <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
            </div>
            <div class="form-group">
                <label for="">@lang('site.phone')  </label>
                <input type="text" class="form-control" name="phone"  value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="">@lang('site.address')  </label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/flashMessage.js') }}"></script>
@endsection
