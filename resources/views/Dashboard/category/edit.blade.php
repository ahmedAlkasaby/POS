@extends('Dashboard.master')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.edit_category')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.edit_category')</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content-body')
<div class="card card-primary">
    @include('Dashboard.includes.success')


    @include('Dashboard.includes.displayErrors')


    <form action="{{ route('category.update',['category'=>$category->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
            @foreach (config('translatable.locales') as $locale)
            <div class="form-group">
                <label for="">@lang('site.'.$locale .'.name')  </label>
                <input type="text" class="form-control" name="{{ $locale }}[name]" value="{{ $category->translate($locale)->name }}">
            </div>
            @endforeach

            {{-- <div class="form-group">
                <label for="">@lang('site.name')</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            </div> --}}
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
