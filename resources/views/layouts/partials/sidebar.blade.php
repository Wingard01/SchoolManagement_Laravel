<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"/>
            <span class="brand-text fw-light">{{ config('app.name', 'School System') }}</span>
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-header">SCHOOL MANAGEMENT</li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Students
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>
                            Teachers
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teachers.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teachers.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Teacher</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-book-fill"></i>
                        <p>
                            Classes
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('classes.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('classes.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add Class</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>