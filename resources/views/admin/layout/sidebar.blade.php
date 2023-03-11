  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
          <img src="{{ asset('template-admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Up-Skaneda</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('template-admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link  {{ $menu == 'dashboard' ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>

                  </li>
                  <li class="nav-item menu-open">
                      <a href="../widgets.html" class="nav-link {{ $menu == 'datamaster' ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Data Master
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('users') }}"
                                  class="nav-link {{ $sub_menu == 'users' ? 'active' : '' }} ">
                                  <i class="far fa-user nav-icon"></i>
                                  <p>Data User</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('kategoriProduk') }}"
                                  class="nav-link {{ $sub_menu == 'kategori_produk' ? 'active' : '' }} ">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kategori Produk</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('produk') }}"
                                  class="nav-link {{ $sub_menu == 'produk' ? 'active' : '' }} ">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Produk</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('transaksi') }}" class="nav-link  {{ $menu == 'transaksi' ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Transaksi
                          </p>
                      </a>

                  </li>
                  {{-- <li class="nav-item">
                      <a href="{{ route('laporan') }}" class="nav-link  {{ $menu == 'laporan' ? 'menu-is-opening menu-open' : '' }} ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Laporan
                          </p>
                      </a>

                  </li> --}}
                  <li class="nav-item">
                      <a href="{{ route('laporanPenjualan') }}" class="nav-link  {{ $menu == 'laporan' ? 'menu-is-opening menu-open' : '' }} ">
                          <i class="nav-icon fas fa-print"></i>
                          <p>
                              Laporan Penjualan
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link  {{ $menu == 'logout' ? 'active' : '' }} "
                          onclick="return confirm('Apakah Anda ingin Logout?')">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout

                          </p>
                      </a>

                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
