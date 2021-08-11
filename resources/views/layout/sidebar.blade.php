<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
                <a href="{{ url('/events/create') }}" class="btn btn-success btn-block">{{__('Launch hours')}}<i class="mdi mdi-plus"></i>
                </a>
            </div>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/providers') }}">
                <i class="menu-icon mdi mdi-account-group-outline"></i>
                <span class="menu-title">{{__('Providers')}}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/events') }}">
                <i class="menu-icon mdi mdi-calendar-multiple"></i>
                <span class="menu-title">{{__('Events')}}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/reports.analytical') }}">
                <i class="menu-icon mdi mdi-file-chart-outline"></i>
                <span class="menu-title">{{__('Report - Analytical')}}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/reports.synthetic') }}">
                <i class="menu-icon mdi mdi-file-chart-outline"></i>
                <span class="menu-title">{{__('Report - Synthetic')}}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/receipt') }}">
                <i class="menu-icon mdi mdi-file-chart-outline"></i>
                <span class="menu-title">{{__('Receipt')}}</span>
            </a>
        </li>
    </ul>
</nav>
