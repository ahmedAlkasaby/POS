<div class="card-tools">
    <form action="{{ route('product.index') }}" method="get">

        <div class="input-group input-group-m" style="width: 400px;">
            <select class="custom-select rounded-0" style="width:150px;" name="category_id">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="text" name="search" class="form-control float-right"
                value="{{ request('search') }}" placeholder="Search" style="150px">


            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
