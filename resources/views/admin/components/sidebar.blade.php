<div class="sidebar-wrapper">
  <div class="sidebar sidebar-collapse" id="sidebar">
      <div class="sidebar__menu-group">
          <ul class="sidebar_nav">
              <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                  <a href="/admin/dashboard">
                      <span class="nav-icon uil uil-arrow-growth"></span>
                      <span class="menu-text">Dashboard</span>
                     
                  </a>
              </li>

              <li>
                <a href="/admin/new-mineral">
                    <span class="nav-icon uil uil-plus-circle"></span>
                    <span class="menu-text">Register Minerals</span>
                </a>
            </li>

              <li>
                  <a href="/admin/manage-minerals">
                      <span class="nav-icon uil uil-database"></span>
                      <span class="menu-text">Manage Minerals</span>
                  </a>
              </li>
 
              <li>
                  <a href="/admin/orders">
                      <span class="nav-icon uil uil-luggage-cart"></span>
                      <span class="menu-text">Manage Orders</span>
                  </a>
              </li>

              <li>
                <a href="/admin/inspection">
                    <span class="nav-icon uil uil-exchange"></span>
                    <span class="menu-text">RRA Inspections</span>
                </a>
            </li>

              <li>
                <a href="/admin/shipping">
                    <span class="nav-icon uil uil-user"></span>
                    <span class="menu-text">Shipping Partners</span>
                </a>
            </li>

            <li>
                <a href="/admin/logout">
                    <span class="nav-icon uil uil-sign-out-alt"></span>
                    <span class="menu-text">Sign Out</span>
                </a>
            </li>
          </ul>
      </div>
  </div>
</div>