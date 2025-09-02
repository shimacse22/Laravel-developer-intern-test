<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bytedash - Admin Template</title>

    <link rel="icon" href="{{ asset('assets/favicons.png') }}" sizes="16x16" type="icon/png">

    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- All Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/icon.css') }}">

    <!-- slick carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">

    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">

    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">


</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader_bars">
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- Dashboard start -->
    <div class="body-overlay"></div>
    <div class="dashboard__area">
        <div class="container-fluid p-0">
            <div class="dashboard__contents__wrapper">
                @include('frontend.layouts.sidebar')
                <div class="dashboard__right">
                    <div class="dashboard__header single_border_bottom">
                        <div class="row gx-4 align-items-center justify-content-between">
                            <div class="col-sm-2">
                                <div class="dashboard__header__left">
                                    <div class="dashboard__header__left__inner">
                                        <span class="dashboard__sidebarIcon d-none d-lg-block"></span>
                                        <span class="dashboard__sidebarIcon__mobile sidebar-icon d-lg-none"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-none d-sm-block">
                                <div class="dashboard__header__middle">
                                    <div class="dashboard__header__middle__search">
                                        <div class="dashboard__header__middle__search__item">
                                            <input class="form--control radius-5" type="text"
                                                placeholder="Search anything...">
                                            <button class="search_icon"><i
                                                    class="material-symbols-outlined">search</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="dashboard__header__right">
                                    <div class="dashboard__header__right__flex">
                                        <div class="dashboard__header__right__item responsive_search">
                                            <a href="javascript:void(0)" class="dashboard__search__icon search__click">
                                                <i class="material-symbols-outlined">search</i> </a>
                                            <div class="search__wrapper">
                                                <form class="search__wrapper__form" action="#">
                                                    <div class="search__wrapper__close"> <i
                                                            class="fa-solid fa-times"></i> </div>
                                                    <input class="search__wrapper__input" type="text"
                                                        placeholder="Search Here.....">
                                                    <button type="submit"><i
                                                            class="material-symbols-outlined">search</i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="dashboard__header__right__item">
                                            <a href="javascript:void(0)"
                                                class="dashboard__header__notification__icon lightMode"
                                                id="mode_change"> <i class="material-symbols-outlined">wb_sunny</i> </a>
                                        </div>
                                        <div class="dashboard__header__right__item">
                                            <div class="dashboard__header__notification">
                                                <a href="javascript:void(0)"
                                                    class="dashboard__header__notification__icon"> <i
                                                        class="material-symbols-outlined">notifications</i> </a>
                                                <span class="dashboard__header__notification__number">9</span>
                                                <div class="dashboard__header__notification__wrap">
                                                    <h6 class="dashboard__header__notification__wrap__title">
                                                        Notifications </h6>
                                                    <ul class="dashboard__header__notification__wrap__list">
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div
                                                                class="dashboard__header__notification__wrap__list__flex">
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__contents">
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title"
                                                                        href="javascript:void(0)"> Notification One </a>
                                                                    <span
                                                                        class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        4 hours ago </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div
                                                                class="dashboard__header__notification__wrap__list__flex">
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__contents">
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title"
                                                                        href="javascript:void(0)"> Notification Two
                                                                    </a>
                                                                    <span
                                                                        class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        8 hours ago </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div
                                                                class="dashboard__header__notification__wrap__list__flex">
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__contents">
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title"
                                                                        href="javascript:void(0)"> Notification Three
                                                                    </a>
                                                                    <span
                                                                        class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        1 day ago </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div
                                                                class="dashboard__header__notification__wrap__list__flex">
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__contents">
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title"
                                                                        href="javascript:void(0)"> Notification Four
                                                                    </a>
                                                                    <span
                                                                        class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        3 day ago </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="dashboard__header__notification__wrap__list__item">
                                                            <div
                                                                class="dashboard__header__notification__wrap__list__flex">
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__icon">
                                                                    <i class="las la-bell"></i>
                                                                </div>
                                                                <div
                                                                    class="dashboard__header__notification__wrap__list__contents">
                                                                    <a class="dashboard__header__notification__wrap__list__contents__title"
                                                                        href="javascript:void(0)"> Notification Five
                                                                    </a>
                                                                    <span
                                                                        class="dashboard__header__notification__wrap__list__contents__sub">
                                                                        7 day ago </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a href="javascript:void(0)"
                                                        class="dashboard__header__notification__wrap__btn"> See All
                                                        Notification </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dashboard__header__right__item">
                                            <div class="dashboard__header__author">
                                                <a href="javascript:void(0)"
                                                    class="dashboard__header__author__flex flex-btn">
                                                    <div class="dashboard__header__author__thumb">
                                                        <img src="html/assets/img/author_nav_new.jpg" alt="authorImg">
                                                    </div>
                                                </a>
                                                <div class="dashboard__header__author__wrapper">
                                                    <div class="dashboard__header__author__wrapper__list">
                                                        <a href="javascript:void(0)"
                                                            class="dashboard__header__author__wrapper__list__item">Sign
                                                            In</a>
                                                        <a href="javascript:void(0)"
                                                            class="dashboard__header__author__wrapper__list__item">Sign
                                                            Up</a>
                                                        <a href="javascript:void(0)"
                                                            class="dashboard__header__author__wrapper__list__item">Log
                                                            Out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__body posPadding">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard end -->


    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery Migrate -->
    <script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <!-- Fancybox JS -->
    <script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
    <!-- Map JS -->
    <script src="{{ asset('assets/js/map/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/map/jquery.mapael.js') }}"></script>
    <script src="{{ asset('assets/js/map/world_countries.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('customJS')

</body>

</html>
