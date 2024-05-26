<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"  href="{{ route('dashboard') }}" >
                <i class="bi bi-grid"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('post.*') ? '' : 'collapsed' }}" data-bs-target="#resources-nav" data-bs-toggle="collapse" href="{{ route('dashboard') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Resources</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="resources-nav" class="nav-content collapse {{ request()->routeIs('post.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('post.index') }}" class="{{ request()->routeIs('post.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Posts</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
