 <!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
         <a href="{{ route('author.dashboard') }}">
             <img src="assets/dynamic/images/logo-icon.png" class="logo-icon" alt="logo icon">
             <h5 class="logo-text">Blog Platform</h5>
         </a>
     </div>
     <ul class="sidebar-menu do-nicescrol">
         <li class="sidebar-header">MAIN NAVIGATION</li>
         <li>
             <a href="{{ route('author.dashboard') }}">
                 <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
             </a>
         </li>
        

     </ul>

 </div>
 <!--End sidebar-wrapper-->

 <!--Start topbar header-->
 <header class="topbar-nav">
     <nav class="navbar navbar-expand fixed-top">
         <ul class="navbar-nav mr-auto align-items-center">
             <li class="nav-item">

             </li>

         </ul>

         <ul class="navbar-nav align-items-center right-nav-link">


             <li class="nav-item">
                 <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                     <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle"
                             alt="user avatar">
                         <h6>Profile</h6>
                     </span>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-right">
                     <li class="dropdown-item user-details">
                         <a href="javaScript:void();">
                             <div class="media">
                                 <div class="avatar"><img class="align-self-start mr-3"
                                         src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                 <div class="media-body">
                                     @if(Auth::check())
                                         <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                                         <p class="user-subtitle">{{ Auth::user()->email }}</p>
                                     @else
                                         <p class="user-title">Guest</p>
                                         <p class="user-subtitle">Please log in to view your details.</p>
                                     @endif

                                     <a>
                                         <form action="{{ route('logout') }}" method="POST"
                                             style="display:inline;">
                                             @csrf
                                             <button type="submit" class="btn btn-link nav-link" style="padding: 0;">
                                                 <i class="fas fa-sign-out-alt"></i> Logout
                                             </button>
                                         </form>
                                     </a>
                                 </div>

                             </div>
                         </a>
                     </li>



             </li>
         </ul>
         </li>
         </ul>
     </nav>
 </header>
 <!--start color switcher-->
 <div class="right-sidebar">
     <div class="switcher-icon">
         <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
     </div>
     <div class="right-sidebar-content">

         <p class="mb-0">Gaussion Texture</p>
         <hr>

         <ul class="switcher">
             <li id="theme1"></li>
             <li id="theme2"></li>
             <li id="theme3"></li>
             <li id="theme4"></li>
             <li id="theme5"></li>
             <li id="theme6"></li>
         </ul>

         <p class="mb-0">Gradient Background</p>
         <hr>

         <ul class="switcher">
             <li id="theme7"></li>
             <li id="theme8"></li>
             <li id="theme9"></li>
             <li id="theme10"></li>
             <li id="theme11"></li>
             <li id="theme12"></li>
             <li id="theme13"></li>
             <li id="theme14"></li>
             <li id="theme15"></li>
         </ul>

     </div>
 </div>
 <!--end color switcher-->
