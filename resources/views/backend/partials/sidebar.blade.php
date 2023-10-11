<div class="container-fluid">
    <div id="two-column-menu"></div>
    <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::is('admin/dashboard') ? 'active':''}}" href="{{ route('backend.dashboard') }}">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
            </a>
        </li> <!-- end Dashboard Menu -->
        @can('view user')
        <li class="nav-item">
            <a class="nav-link menu-link {{ Request::is('admin/users') ? 'active':''}}" href="{{ route('users.index') }}">
                <i class="las la-user-circle"></i> <span data-key="t-widgets">Users</span>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-layouts">Setup</span>
            </a>
            <div class="collapse menu-dropdown {{ Request::is(['admin/roles','admin/roles/create','admin/permissions','admin/setup']) ? 'show':''}}" id="sidebarLayouts">
                <ul class="nav nav-sm flex-column">
                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"class="nav-link {{ Request::is(['admin/roles','admin/roles/create']) ? 'active':''}}" data-key="t-two-column">Role</a>
                        </li>
                    @endcan
                    @can('view permission')
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link {{ Request::is(['admin/permissions','admin/permissions/create']) ? 'active':''}}" data-key="t-hovered">Permission</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li> 
        
        <li class="nav-item">
            <a class="nav-link menu-link" href="#">
                <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
            </a>
        </li>
    </ul>
</div>