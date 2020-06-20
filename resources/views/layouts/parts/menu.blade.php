
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
            Categories
        </p>
    </a>
</li>
