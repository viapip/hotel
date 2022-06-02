<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.home-page.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.location-home.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Convenient Location</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fab fa-cc-discover"></i>
                <p>
                    Discover
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.discover-block.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Block</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.discover.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Items</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Rooms
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.rooms-page.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.rooms.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Items</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.feature.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Features</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-football-ball"></i>
                <p>
                    Events
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.events-page.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events-banner.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Events</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.location-page.index') }}" class="nav-link">
                <i class="nav-icon fas fa-ring"></i>
                <p>Location</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-map-marked-alt"></i>
                <p>
                    About
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.about-page.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.about-banners.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banners</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Gallery
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.gallery-page.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Items</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
                <i class="nav-icon fas fa-phone"></i>
                <p>Contacts</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.privacy.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Privacy and Data Policy </p>
            </a>
        </li>
    </ul>
</nav>
