<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src={{ asset("img/logo.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{ asset("img/user-profile.jpg")}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                <a class="dropdown-item" style="color: white" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            {{-- </div> --}}


        </div>
        {{-- <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li> --}}
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                @lang('site.dashboard')
              </p>
            </a>
          </li>
          @if (auth()->user()->hasPermission('users-read'))
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                @lang('site.users')
              </p>
            </a>
          </li>

          @endif

        @if (auth()->user()->hasPermission('categories-read'))
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                @lang('site.category')
              </p>
            </a>
          </li>
        @endif

        @if (auth()->user()->hasPermission('products-read'))
        <li class="nav-item">
          <a href="{{ route('product.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              @lang('site.Product')
            </p>
          </a>
        </li>
      @endif

      @if (auth()->user()->hasPermission('clients-read'))
      <li class="nav-item">
        <a href="{{ route('client.index') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            @lang('site.clients')
          </p>
        </a>
      </li>
    @endif
    @if (auth()->user()->hasPermission('orders-read'))
    <li class="nav-item">
      <a href="{{ route('order.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          @lang('site.orders')
        </p>
      </a>
    </li>
  @endif


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
