<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="dashboard_container">
        <div class="left_menu_container" id="menuList">
            <span id="closeBtn" class="close_btn"><i class="bx bx-arrow-back"></i></span>
            <div class="user_profile">
                <img src="{{ asset('profile/man.png') }}" alt="" class="profile_img" />
                <br>
                <span class="profile_name">{{ Session()->get('LOGIN_USER')->name }}</span>
            </div>

            <hr />
            <div class="menu_list">
                <ul class="menu">
                    <a href="" class="menu_link">
                        <li class="menu_item">Orders List</li>
                    </a>
                    <a href="{{ route('product#list') }}" class="menu_link">
                        <li class="menu_item">Products List</li>
                    </a>
                    <a href="" class="menu_link">
                        <li class="menu_item">Brands List</li>
                    </a>
                    <a href="" class="menu_link">
                        <li class="menu_item">Employees List</li>
                    </a>
                    <a href="{{ route('emp#logout') }}" class="menu_link">
                        <li class="menu_item">Log Out</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="right_content_container">
            <div class="content_header">
                <div id="toggleBtn">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
                <div class="logo_name">
                    <h2>M-shop</h2>
                </div>
                <div class="noti"><i class="bx bxs-bell-ring"></i></div>
            </div>
            @yield('content')
        </div>
    </div>
</body>
<script src="{{ asset('js/index.js') }}"></script>

</html>
