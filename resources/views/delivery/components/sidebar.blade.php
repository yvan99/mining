<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ Request::is('delivery/dashboard') ? 'active' : '' }}">
                    <a href="/delivery/dashboard">
                        <span class="nav-icon uil uil-arrow-growth"></span>
                        <span class="menu-text">Dashboard</span>

                    </a>
                </li>


                <li class="{{ Request::is('delivery/shipping') ? 'active' : '' }}">
                    <a href="/delivery/shipping">
                        <span class="nav-icon uil uil-luggage-cart"></span>
                        <span class="menu-text">Manage Delivery</span>
                    </a>
                </li>

                <li class="{{ Request::is('delivery/logout') ? 'active' : '' }}">
                    <a href="/delivery/logout">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
