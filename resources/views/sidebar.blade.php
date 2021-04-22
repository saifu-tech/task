<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Stock Manage
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                @if(Auth::User()->user_type == 'admin')
                  <li class="nav-active">
                    <a class="nav-link" href="{{ route('managecustomer') }}">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span>Customer</span>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
    </div>
    <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
            	if (localStorage.getItem('sidebar-left-position') !== null) {
            		var initialPosition = localStorage.getItem('sidebar-left-position'),
            		sidebarLeft = document.querySelector('#sidebar-left .nano-content');            
            		sidebarLeft.scrollTop = initialPosition;
            	}
            }
        </script>
    </div>
</aside>