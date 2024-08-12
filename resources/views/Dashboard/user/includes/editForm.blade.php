<form action="{{ route('user.update',['user'=>$user->id]) }}" method="post">
    @method('put')
    @csrf

    <div class="card-body">

        <div class="form-group">
            <label for="">@lang('site.name')</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">@lang('site.email')</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">@lang('site.password')</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">@lang('site.password_conformation')</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                name="password_confirmation">
        </div>

     @include('Dashboard.user.includes.tabsEdit')


    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
