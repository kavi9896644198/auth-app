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
<!-- resources/views/layouts/navbar.blade.php -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route($redirectUrl) }}" class="nav-link">Home</a>
        </li>
    </ul>
</nav>
