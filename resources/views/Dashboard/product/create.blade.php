@extends('Dashboard.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('site.create_product')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">@lang('site.create_product')</a></li>
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


    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @foreach (config('translatable.locales') as $locale)
            <div class="form-group">
                <label for="">@lang('site.'.$locale .'.name') </label>
                <input type="text" class="form-control" name="{{ $locale }}[name]" value="{{ old($locale.'.name') }}">
            </div>
            @endforeach

            <label for="">@lang('site.ar.description')</label>
            <textarea name="ar[description]" id="editorar" >
                {{ old('ar.description') ?? '' }}
            </textarea>

            <label for="">@lang('site.en.description')</label>
            <textarea name="en[description]" id="editoren" >
                {{ old('en.description') ?? '' }}

            </textarea>


            <div class="form-group">

                <div class="input-group">
                    <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">@lang('site.image')</label>

                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">@lang('site.upload')</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>@lang('site.category')</label>
                <select class="form-control" name="category_id">
                    <option value="">@lang('site.category')</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">@lang('site.price') </label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
                <label for="">@lang('site.selling_price') </label>
                <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price') }}">
            </div>

            <div class="form-group">
                <label for="">@lang('site.qty') </label>
                <input type="number" class="form-control" name="qty" value="{{ old('qty') }}">
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

