@if (session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
@endif



@if (session('deleteUser'))
    <div class="alert alert-success" id="flash-message">
        {{ session('deleteUser') }}
    </div>
@endif

@if (session('deleteCategory'))
    <div class="alert alert-success" id="flash-message">
        {{ session('deleteCategory') }}
    </div>
@endif

@if (session('createProduct'))
    <div class="alert alert-success" id="flash-message">
        {{ session('createProduct') }}
    </div>
@endif

@if (session('updateProduct'))
    <div class="alert alert-success" id="flash-message">
        {{ session('updateProduct') }}
    </div>
@endif

@if (session('deleteProduct'))
    <div class="alert alert-success" id="flash-message">
        {{ session('deleteProduct') }}
    </div>
@endif

@if (session('createClient'))
    <div class="alert alert-success" id="flash-message">
        {{ session('createClient') }}
    </div>
@endif

@if (session('editClient'))
    <div class="alert alert-success" id="flash-message">
        {{ session('editClient') }}
    </div>
@endif

@if (session('deleteClient'))
    <div class="alert alert-success" id="flash-message">
        {{ session('deleteClient') }}
    </div>
@endif

@if (session('createCart'))
    <div class="alert alert-success" id="flash-message">
        {{ session('createCart') }}
    </div>
@endif


@if (session('deleteCart'))
    <div class="alert alert-success" id="flash-message">
        {{ session('deleteCart') }}
    </div>
@endif

@if (session('createOrder'))
    <div class="alert alert-success" id="flash-message">
        {{ session('createOrder') }}
    </div>
@endif

@if (session('orderUpdate'))
    <div class="alert alert-success" id="flash-message">
        {{ session('orderUpdate') }}
    </div>
@endif

@if (session('orderDelete'))
    <div class="alert alert-success" id="flash-message">
        {{ session('orderDelete') }}
    </div>
@endif
