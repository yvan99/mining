<div class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="{{ Request::is('rra/dashboard') ? 'active' : '' }}">
                    <a href="/rra/dashboard">
                        <span class="nav-icon uil uil-arrow-growth"></span>
                        <span class="menu-text">Dashboard</span>

                    </a>
                </li>

                <li class="{{ Request::is('rra/transit') ? 'active' : '' }}">
                    <a href="/rra/transit">
                        <span class="nav-icon uil uil-luggage-cart"></span>
                        <span class="menu-text">Transit Report</span>
                    </a>
                </li>

                <li class="{{ Request::is('rra/logout') ? 'active' : '' }}">
                    <a href="/rra/logout">
                        <span class="nav-icon uil uil-sign-out-alt"></span>
                        <span class="menu-text">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
