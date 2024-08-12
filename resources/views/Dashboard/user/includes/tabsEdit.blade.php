<div class="col-12 col-sm-6">
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home"
                        role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">@lang('site.user')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                        href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                        aria-selected="false">@lang('site.Category')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                        href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                        aria-selected="false">@lang('site.Product')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-clients-tab" data-toggle="pill"
                        href="#custom-tabs-one-clients" role="tab" aria-controls="custom-tabs-one-messages"
                        aria-selected="false">@lang('site.client')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-orders-tab" data-toggle="pill"
                        href="#custom-tabs-one-orders" role="tab" aria-controls="custom-tabs-one-messages"
                        aria-selected="false">@lang('site.order')</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel"
                    aria-labelledby="custom-tabs-one-home-tab">
                    <div class="form-check">
                        <input type="checkbox" value="users-read" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('users-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Read User</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="users-create" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('users-create') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Create User</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="users-update" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('users-update') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Edit User</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="users-delete" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('users-delete') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Delete User</label>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="form-check">
                        <input type="checkbox" value="categories-create" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('categories-create') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Create Category</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="categories-read" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('caregories-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Read Category</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="categories-update" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('categories-update') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Edit Category</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="categories-delete" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('categories-delete') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Delete Category</label>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="form-check">
                        <input type="checkbox" value="products-create" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('products-create') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Create Product</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="products-read" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('products-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Read Product</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="products-update" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('products-update') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Edit Product</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="products-delete" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('products-delete') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Delete Product</label>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-clients" role="tabpanel"
                    aria-labelledby="custom-tabs-one-clients-tab">
                    <div class="form-check">
                        <input type="checkbox" value="clients-create" class="form-check-input" id="exampleCheck1"
                            name="permissions[]"  {{ $user->hasPermission('clients-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Create Client</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="clients-read" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('clients-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Read Client</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="clients-update" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('clients-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Edit Client</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="clients-delete" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('clients-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Delete Client</label>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-orders" role="tabpanel"
                    aria-labelledby="custom-tabs-one-orders-tab">
                    <div class="form-check">
                        <input type="checkbox" value="orders-create" class="form-check-input" id="exampleCheck1"
                            name="permissions[]" {{ $user->hasPermission('orders-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Create Order</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="orders-read" class="form-check-input" id="exampleCheck1"
                            name="permissions[]"{{ $user->hasPermission('orders-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Read Order</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="orders-update" class="form-check-input" id="exampleCheck1"
                            name="permissions[]"{{ $user->hasPermission('orders-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Edit Order</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" value="orders-delete" class="form-check-input" id="exampleCheck1"
                            name="permissions[]"{{ $user->hasPermission('orders-read') ? 'checked':"" }}>
                        <label class="form-check-label" for="exampleCheck1">Delete Order</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
