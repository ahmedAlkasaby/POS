@extends('Dashboard.master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.edit_user')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.create_user')</a></li>
                <li class="breadcrumb-item active">@lang('site.edit')</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content-body')
<div class="card card-primary">
    @include('Dashboard.includes.success')


    @include('Dashboard.includes.displayErrors')


   @include('Dashboard.user.includes.editForm')
</div>
@endsection

@section('js')
<script src="{{ asset('js/flashMessage.js') }}"></script>
@endsection
