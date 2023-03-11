<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ Request::is('client/dashboard') ? 'active' : '' }}">
                    <a href="/client/dashboard">
                        <span class="nav-icon uil uil-arrow-growth"></span>
                        <span class="menu-text">Dashboard</span>

                    </a>
                </li>

                <li class="{{ Request::is('client/view-minerals') ? 'active' : '' }}">
                    <a href="/client/view-minerals">
                        <span class="nav-icon uil uil-database"></span>
                        <span class="menu-text">Available Minerals</span>
                    </a>
                </li>

                <li class="{{ Request::is('client/orders') ? 'active' : '' }}">
                    <a href="/client/orders">
                        <span class="nav-icon uil uil-luggage-cart"></span>
                        <span class="menu-text">Orders Report</span>
                    </a>
                </li>

                <li class="{{ Request::is('client/logout') ? 'active' : '' }}">
                    <a href="/client/logout">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
