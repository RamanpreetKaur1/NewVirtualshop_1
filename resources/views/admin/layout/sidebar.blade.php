
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                    <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                    <span key="t-dashboards">Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/dashboard') }}" key="t-default">Admin Dashboard</a></li>
                    </ul>
                </li>
                @if (Auth::guard('admin')->user()->type == "seller")
                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-ecommerce">Seller Details</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('admin/seller_view/'.Auth::guard('admin')->user()->seller_id) }}" key="t-personaldetails">Seller's Details</a></li>

                        </ul>

                    </li> --}}


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-ecommerce">Catalogue Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin/sections') }}" key="t-section">Section</a></li>
                            <li><a href="{{ route('admin/categories') }}" key="t-category">Category</a></li>
                            <li><a href="{{ url('admin/brands') }}" key="t-brands">Brands</a></li>
                            <li><a href="{{ url('admin/products') }}" key="t-section">Product</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-ecommerce">Banner Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin/banners') }}" key="t-section">Home Page Banners</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-cog font-size-16 align-middle me-1"></i>
                        <span key="t-ecommerce">Setting</span>
                        </a>
                        {{-- <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin/update-admin-password') }}" key="t-updatepassword">Update Password</a></li>
                            <li><a href="{{ route('admin/update-admin-details') }}" key="t-updatedetail">Update Detail</a></li>
                        </ul> --}}
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin/update-admin-password') }}" key="t-updatepassword">Update Password</a></li>
                            {{-- <li><a href="{{ route('admin/update-admin-details') }}" key="t-updatedetail">Update Detail</a></li> --}}
                            <li><a href="{{ url('admin/seller_view/'.Auth::guard('admin')->user()->seller_id) }}" key="t-updatedetail">Update Details</a></li>

                        </ul>
                    </li>
                @else
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Admin Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/admins/admin') }}" key="t-admin">Admins</a></li>
                        <li><a href="{{ url('admin/admins/seller') }}" key="t-seller">Seller</a></li>
                        <li><a href="{{ url('admin/admins/') }}" key="t-all">All</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Seller Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{ url('admin/admins/admin') }}" key="t-admin">Admins</a></li> --}}
                        <li><a href="{{ url('admin/admins/seller') }}" key="t-seller">Sellers</a></li>
                        {{-- <li><a href="{{ url('admin/admins/') }}" key="t-all">All</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Catalogue Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/sections') }}" key="t-section">Section</a></li>
                        <li><a href="{{ route('admin/categories') }}" key="t-category">Category</a></li>
                        <li><a href="{{ url('admin/brands') }}" key="t-brands">Brands</a></li>
                        <li><a href="{{ url('admin/products') }}" key="t-section">Product</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Banner Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/banners') }}" key="t-section">Home Page Banners</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog font-size-16 align-middle me-1"></i>
                        {{-- <i class="bx bx-cog bx-spin align-middle me-1"></i> --}}
                    <span key="t-ecommerce">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/update-admin-password') }}" key="t-updatepassword">Update Password</a></li>
                        <li><a href="{{ route('admin/update-admin-details') }}" key="t-updatedetail">Update Detail</a></li>

                    </ul>
                </li>

                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
