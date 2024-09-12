<!-- resources/views/layouts/sidebar.blade.php -->
@php
    $roleType = Auth::user()->role;
    $redirectUrl = 'dashboard';
    switch ($roleType) {

        case (1):
        $redirectUrl = 'super-admin.dashboard';
        break;

        case (2):
        $redirectUrl = 'admin.dashboard';
        break;

        case (3):
        $redirectUrl = 'dashboard';
        break;
        }
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route($redirectUrl) }}" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route($redirectUrl) }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- More links based on roles -->
            </ul>
        </nav>
    </div>
</aside>
