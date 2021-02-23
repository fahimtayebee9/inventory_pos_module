<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar ps ps--active-y">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ route('dashboard') }}" class="br-menu-link @if (Route::currentRouteNamed('dashboard') == 'dashboard') active @endif">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            

            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Web Functionality</label>

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub ">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Manage Users</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('user.create') }}" class="sub-link ">Add New User</a></li> {{--  --}}
                    <li class="sub-item"><a href="{{ route('user.manage') }}" class="sub-link ">View All Users</a></li> {{--  --}}
                </ul>
            </li>
            
            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Inventory Functionality</label>

            
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub ">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Manage Category</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('category.create') }}" class="sub-link ">Add New Category</a></li> {{--  --}}
                    <li class="sub-item"><a href="{{ route('category.manage') }}" class="sub-link ">View All Categories</a></li> {{--  --}}
                </ul>
            </li>
            
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub ">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Manage Products</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('product.create') }}" class="sub-link ">Add New Product</a></li> {{--  --}}
                    <li class="sub-item"><a href="{{ route('product.manage') }}" class="sub-link ">View All Products</a></li> {{--  --}}
                </ul>
            </li>

            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Website Management</label>
            
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Manage Sliders</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('slider.create') }}" class="sub-link ">Add New Slider</a></li> {{--  --}}
                    <li class="sub-item"><a href="{{ route('slider.manage') }}" class="sub-link ">View All Sliders</a></li> {{--  --}}
                </ul>
            </li>
        </ul><!-- br-sideleft-menu -->

    <br>
</div><!-- br-sideleft -->