<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ url('/dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Dashboard</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ url('/') }}" class="nav-item nav-link @yield('select_dashboard')"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('categories.index') }}" class="nav-item nav-link @yield('select_category')"><i class="fa fa-tachometer-alt me-2"></i>Category</a>
            <a href="{{ route('coupons.index') }}" class="nav-item nav-link @yield('select_coupon')"><i class="fa fa-tachometer-alt me-2"></i>Coupon</a>
            <a href="{{ route('products.index') }}" class="nav-item nav-link @yield('select_product')"><i class="fa fa-tachometer-alt me-2"></i>Products</a>
            <a href="{{ route('banners.index') }}" class="nav-item nav-link @yield('select_banner')"><i class="fa fa-tachometer-alt me-2"></i>Banner</a>
            <a href="{{ route('brands.index') }}" class="nav-item nav-link @yield('select_brand')"><i class="fa fa-tachometer-alt me-2"></i>Brand</a>
            <a href="{{ route('shippings.index') }}" class="nav-item nav-link @yield('select_shipping')"><i class="fa fa-tachometer-alt me-2"></i>Shipping</a>
            <a href="{{ route('plans.index') }}" hidden class="nav-item nav-link @yield('select_plan')"><i class="fa fa-tachometer-alt me-2"></i>Plans</a>

            <!-- <a href="{{ route('media_manager') }}" class="nav-item nav-link @yield('select_media')"><i class="fa fa-tachometer-alt me-2"></i>Media Manager</a> -->

            <a hidden href="{{ route('roles.index') }}" class="nav-item nav-link @yield('select_role')"><i class="fa fa-tachometer-alt me-2"></i>Role</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Posts</a>
                <div class="dropdown-menu bg-transparent border-0">
                <a href="{{ route('posts.index') }}" class="nav-item nav-link @yield('select_posts')"><i class="fa fa-tachometer-alt me-2"></i>Posts</a>
                <a href="{{ route('posttags.index') }}" class="nav-item nav-link @yield('select_posttag')"><i class="fa fa-tachometer-alt me-2"></i>Post Tags</a>
                <a href="{{ route('postcats.index') }}" class="nav-item nav-link @yield('select_postcat')"><i class="fa fa-tachometer-alt me-2"></i>Post Category</a>

                </div>
            </div>
        </div>
    </nav>
</div>
