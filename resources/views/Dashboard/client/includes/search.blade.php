<div class="card-tools">
    <form action="{{ route('client.index') }}" method="get">

        <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="search" class="form-control float-right"
                value="{{ request('search') }}" placeholder="Search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
