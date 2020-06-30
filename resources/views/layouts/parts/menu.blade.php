
<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}"
       class="nav-link {{ Route::currentRouteName() == 'admin.dashboard'? 'active' : '' }}">
        <i class="nav-icon fa fa-dashboard"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}"
       class="nav-link  {{ Route::currentRouteName() == 'admin.categories.index'? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Categorie
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.products.index') }}"
       class="nav-link  {{ Route::currentRouteName() == 'admin.products.index'? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Products
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}"
       class="nav-link  {{ Route::currentRouteName() == 'admin.orders.index'? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Orders
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.clients.index') }}"
       class="nav-link  {{ Route::currentRouteName() == 'admin.clients.index'? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            clients
        </p>
    </a>
</li>
