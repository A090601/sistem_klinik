     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
             <div class="sidebar-brand-icon rotate-n-15">
                 <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50px">
             </div>

         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item @yield('dashboard')">
             <a class="nav-link" href="{{ route('dashboard') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Interface
         </div>
         @if (auth()->user()->level_id == 1)
             <li class="nav-item @yield('admin')">
                 <a class="nav-link" href="{{ route('admin.index') }}">
                     <i class="fas fa-fw fa-user"></i>
                     <span>Admin</span></a>
             </li>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item @yield('pegawai')  @yield('dokter')">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employee"
                     aria-expanded="true" aria-controls="employee">
                     <i class="fas fa-fw fa-users"></i>
                     <span>Employee</span>
                 </a>
                 <div id="employee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header"></h6>
                         <a class="collapse-item" href="{{ route('pegawai.index') }}">Pegawai</a>
                         <a class="collapse-item" href="{{ route('dokter.index') }}">Dokter</a>
                     </div>
                 </div>
             </li>

             <li class="nav-item @yield('pendaftaran')">
                 <a class="nav-link " href="{{ route('pendaftaran.index') }}">
                     <i class="fas fa-fw fa-book"></i>
                     <span>Pendaftaran</span></a>
             </li>

             <li class="nav-item @yield('dataPasien')">
                 <a class="nav-link " href="{{ route('pendaftaran.dataPasien') }}">
                     <i class="fas fa-fw fa-address-card"></i>
                     <span>Data Pasien</span></a>
             </li>


             <li class="nav-item @yield('tindakanMedis')">
                 <a class="nav-link " href="{{ route('tindakan.index') }}">
                     <i class="fas fa-fw fa-thermometer"></i>
                     <span>Tindakan Medis</span></a>
             </li>

             <li class="nav-item  @yield('supplier')">
                 <a class="nav-link" href="{{ route('supplier.index') }}">
                     <i class="fas fa-fw fa-address-card"></i>
                     <span>Data Supplier</span></a>
             </li>

             <li class="nav-item @yield('stokObat')">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apoteker"
                     aria-expanded="true" aria-controls="apoteker">
                     <i class="fas fa-fw fa-list"></i>
                     <span>Apoteker</span>
                 </a>
                 <div id="apoteker" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header"></h6>

                         <a class="collapse-item" href="{{ route('obat.index') }}">Pengeluaran Obat</a>
                         <a class="collapse-item" href="{{ route('stok.index') }}">Stock Obat</a>
                     </div>
                 </div>
             </li>
         @endif
         @if (auth()->user()->level_id == 2)
             <li class="nav-item @yield('tindakanMedis')">
                 <a class="nav-link " href="{{ route('tindakan.index') }}">
                     <i class="fas fa-fw fa-thermometer"></i>
                     <span>Tindakan Medis</span></a>
             </li>

             <li class="nav-item  @yield('supplier')">
                 <a class="nav-link" href="{{ route('supplier.index') }}">
                     <i class="fas fa-fw fa-address-card"></i>
                     <span>Data Supplier</span></a>
             </li>

             <li class="nav-item @yield('stokObat')">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apoteker"
                     aria-expanded="true" aria-controls="apoteker">
                     <i class="fas fa-fw fa-list"></i>
                     <span>Apoteker</span>
                 </a>
                 <div id="apoteker" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header"></h6>

                         <a class="collapse-item" href="{{ route('obat.index') }}">Pengeluaran Obat</a>
                         <a class="collapse-item" href="{{ route('stok.index') }}">Stock Obat</a>
                     </div>
                 </div>
             </li>
         @endif
         @if (auth()->user()->level_id == 3)
             <li class="nav-item @yield('tindakanMedis')">
                 <a class="nav-link " href="{{ route('tindakan.index') }}">
                     <i class="fas fa-fw fa-thermometer"></i>
                     <span>Tindakan Medis</span></a>
             </li>
         @endif
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->
