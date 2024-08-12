@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('canNotDeleteProduct'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('canNotDeleteProduct') }}
    </div>
@endif

@if (session('canNotDeleteCategory'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('canNotDeleteCategory') }}
    </div>
@endif

@if (session('canNotDeleteClient'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('canNotDeleteClient') }}
    </div>
@endif
@if (session('canNotDeleteOrder'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('canNotDeleteOrder') }}
    </div>
@endif
@if (session('canNotDeleteUser'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('canNotDeleteUser') }}
    </div>
@endif
