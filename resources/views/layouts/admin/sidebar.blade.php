 <!--start sidebar-->
 <aside class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
         <div class="logo-icon">
             <img src="../assets/images/logo-icon.png" class="logo-img" alt="">
         </div>
         <div class="logo-name flex-grow-1">
             <h5 class="mb-0">Maxton</h5>
         </div>
         <div class="sidebar-close">
             <span class="material-icons-outlined">close</span>
         </div>
     </div>
     <div class="sidebar-nav">
         <!--navigation-->
         <ul class="metismenu" id="sidenav">
             <li>
                 <a href="{{ url('/admin') }}">
                     <div class="parent-icon"><i class="material-icons-outlined">home</i>
                     </div>
                     <div class="menu-title">Dashboard</div>
                 </a>
             <li>
                 {{-- <a href="{{url('barang.index')}}">
                <div class="parent-icon"><i class="material-icons-outlined">Description</i>
                </div>
                <div class="menu-title">Barang</div>
              </a> --}}
             </li>
             </li>
             <li>
                 <a href="{{ route('user.index') }}">
                     <div class="parent-icon"><i class="material-icons-outlined">person</i>
                     </div>
                     <div class="menu-title">Users Widgets</div>
                 </a>
             </li>
             <li class="menu-label">UI Elements</li>
             <li>
                 <a href="{{ route('barang.index') }}">
                     <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                     </div>
                     <div class="menu-title">Barang</div>
                 </a>
                 <a href="{{ route('barangmasuk.index') }}">
                     <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                     </div>
                     <div class="menu-title">Barang Masuk</div>
                 </a>
                 <a href="{{ route('barangkeluar.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">Barang Keluar</div>
                </a>
                <a href="{{ route('pinjaman.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">Pinjaman</div>
                </a>
                <a href="{{ route('pengembalian.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">Pengembalian</div>
                </a>
             </li>
         </ul>
         <!--end navigation-->
     </div>
 </aside>
 <!--end sidebar-->
