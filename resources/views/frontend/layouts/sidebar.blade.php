 <div class="dashboard__left dashboard-left-content">
     <div class="dashboard__left__main">
         <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
         <div class="dashboard__top">
             <div class="dashboard__top__logo">
                 <a href="index.html">
                     <img class="main_logo" src="{{ asset('assets/img/logo.webp') }}" alt="logo">
                     <img class="iocn_view__logo" src="{{ asset('assets/img/Favicon.png') }}" alt="logo_icon">
                 </a>
             </div>
         </div>
         <div class="dashboard__bottom mt-5">
             <div class="dashboard__bottom__search mb-3">
                 <input class="form--control  w-100" type="text" placeholder="Search here..."
                     id="search_sidebarList">
             </div>
             <ul class="dashboard__bottom__list dashboard-list">
                 <li class="dashboard__bottom__list__item has-children show open active">
                     <a href="javascript:void(0)"><i class="material-symbols-outlined">dashboard</i> <span
                    class="icon_title">Dashboard</span></a>
                 </li>
                 <li class="dashboard__bottom__list__item">
                     <a href="{{ route('countries.index') }}"><span class="icon_title">Country</span></a>
                 </li>

                 <li class="dashboard__bottom__list__item">
                     <a href="{{ route('states.index') }}"><span class="icon_title">State</span></a>
                 </li>
                 <li class="dashboard__bottom__list__item">
                     <a href="{{ route('cities.index') }}"><span class="icon_title">City</span></a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
