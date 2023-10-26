<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="/" class="brand-link">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Trang chủ</p>
          </a>
        </li>


        {{-- Product Management --}}
        <li class="nav-item">

          <a href="" class="nav-link">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Quản lý sản phẩm<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('products.index') }}" class="nav-link">
                <p>Sản phẩm</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <p>Danh mục</p>
              </a>
            </li>

          </ul>
        </li>


        {{-- Sale Management --}}
        <li class="nav-item">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>Quản lý bán hàng<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            {{-- order --}}
            <li class="nav-item">
              <a href="{{ route('orders.index') }}" class="nav-link">
                <p>Đơn hàng</p>
              </a>
            </li>

            {{-- Order status --}}
            <li class="nav-item">
              <a href="{{ route('orderStatuses.index') }}" class="nav-link">
                <p>Trạng thái đơn hàng</p>
              </a>
            </li>

          </ul>
        </li>

        {{-- Customer Management --}}
        <li class="nav-item">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Quản lý khách hàng<i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            {{--level --}}
            <li class="nav-item">
              <a href="{{ route('levels.index') }}" class="nav-link">
                <p>Phân hạng khách khàng</p>
              </a>
            </li>


          </ul>
        </li>
      </ul>
    </nav>

  </div>

</aside>
