   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src={{ asset('profile.png') }} class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">{{Auth::user()->full_name}}</a>
               </div>
           </div>
           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-item">
                       <a href="{{route('dashboard')}}" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p> Dashboard</p>
                       </a>
                   </li>

                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fa fa-book"></i>
                           <p> Books </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fa fa-book-open"></i>
                           <p> Popular Books </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fa fa-heart"></i>
                           <p> Favorites Books </p>
                       </a>
                   </li>

                   <li class="nav-item menu-close">
                       <a href="#" class="nav-link ">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                               User Management
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Register User </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="" class="nav-link ">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Register Admin </p>
                               </a>
                           </li>
                       </ul>
                   </li>
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
