@extends('Dashboard.master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.create_user')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.create_user')</a></li>
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





    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>


    <form action="{{ route('user.store') }}" method="post">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label for="">@lang('site.name')</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">@lang('site.email')</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">@lang('site.password')</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">@lang('site.password_conformation')</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>

         @include('Dashboard.user.includes.tabsCreate')


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
