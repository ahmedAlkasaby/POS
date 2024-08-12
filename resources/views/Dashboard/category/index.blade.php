@extends('Dashboard.master')
@section('content-header')
@include('Dashboard.category.includes.contentHeader')
@endsection


@section('content-body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (auth()->user()->hasPermission('categories-create'))
                    <a href="{{ route('category.create') }}"> <button type="button"
                            class="btn btn-primary">@lang('site.new')</button></a>
                    @else
                    <button type="button" class="btn btn-primary  disabled">@lang('site.new')</button>

                    @endif
                    @include('Dashboard.category.includes.search')
                </div>
                @if ($categories->count() > 0)
                <div class="card-body table-responsive p-0">
                    @include('Dashboard.includes.success')
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>



                                <th>@lang('site.count_products')</th>
                                <th>@lang('site.related_products')</th>
                                <th>@lang('site.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products->count() }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('products-read'))
                                    <a href="{{ route('product.index',['category_id'=>$category->id]) }}"><button type="button" class="btn btn-success">@lang('site.related_products')</button></a>

                                    @else
                                    <button type="button" class="btn btn-success disabled">@lang('site.related_products')</button>

                                    @endif
                                </td>

                                <td>
                                    @if (auth()->user()->hasPermission('categories-update'))
                                    <a href="{{ route('category.edit',['category'=>$category->id]) }}"><button type="button"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i></button></a>
                                    @else
                                    <button type="button" class="btn btn-secondary disabled"><i
                                            class="fas fa-edit"></i></button>
                                    @endif
                                    @if (auth()->user()->hasPermission('categories-delete'))
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('Dashboard.category.includes.deleteModel')
                                    </form>
                                    @else
                                    <button type="button" class="btn btn-danger disabled"><i
                                            class="fas fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
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
