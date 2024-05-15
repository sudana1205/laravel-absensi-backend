<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            {{-- <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>

            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Users</span></a>

            </li> --}}

            {{-- <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Users</span></a>

            </li> --}}

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link "><i class="fas fa-columns"></i>
                     <span>Users</span></a>

            </li>
            <li class="nav-item">
                <a href="{{ route('companies.show',1/**angka satu dari value company find(1) di file CompanyController.php**/) }}" class="nav-link "><i class="fas fa-columns"></i>
                    <span>Company</span></a>

            </li>



    </aside>
</div>
