<aside class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Profile Start -->
    <div class="sidebar--profile">
        <div class="profile--img">
            <a href="profile.html">
                <img src="assets/img/avatars/01_80x80.png" alt="" class="rounded-circle">
            </a>
        </div>

        <div class="profile--name">
            <a href="profile.html" class="btn-link">{{ auth()->user()->first_name; }}</a>
        </div>

        <div class="profile--nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="profile.html" class="nav-link" title="User Profile">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="lock-screen.html" class="nav-link" title="Lock Screen">
                        <i class="fa fa-lock"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="mailbox_inbox.html" class="nav-link" title="Messages">
                        <i class="fa fa-envelope"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-forms" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-forms').submit();">
                        {{ __('Logout') }}
                    </a>

                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar Profile End -->

    <!-- Sidebar Navigation Start -->
    <div class="sidebar--nav">
        <ul>
            <li>
                <ul>
                    <li class="active">
                        <a href="{{route('dashboard.home')}}">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(auth ()->user()-> hasPermission('admins_read'))
                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>User And Authentications</span>
                        </a>

                        <ul>
                            <li><a href="{{ route('dashboard.admins.index') }}">Users</a></li>
                            <li><a href="{{ route('dashboard.roles.index') }}">Rols</a></li>
                            <li><a href="orders.html">Permission</a></li>

                        </ul>
                    </li>
                    @endif
                    @if(auth ()->user()-> hasPermission('categories_read'))

                    <a href="#">

                        </a>

                    <li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-shopping-cart"></i>
                            <span>Categories</span> </a></li>

                    @endif
                    @if(auth ()->user()-> hasPermission('products_read'))

                    <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-shopping-cart"></i>
                            <span>Products</span></a></li>

                    @endif
                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Invoices</span>
                        </a>

                        <ul>
                            <li><a href="">Invoices</a></li>
                            <li><a href="products.html">Invoices Paid</a></li>

                            <li><a href="orders.html">Invoices Orders</a></li>

                        </ul>
                    </li>
                </ul>
            </li>

            <!-- <li>
                        <a href="#">Users</a>

                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-th"></i>
                                    <span>User Invoices</span>
                                </a>

                                <ul>
                                    <li><a href="blank.html">Blank Page</a></li>
                                    <li><a href="page-light.html">Page Light</a></li>
                                    <li><a href="sidebar-light.html">Sidebar Light</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li> -->


        </ul>
    </div>
    <!-- Sidebar Navigation End -->

</aside>
