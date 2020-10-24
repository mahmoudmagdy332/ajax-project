<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport Coach</title>



    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
        span.stars ol li:hover {

        }
    </style>
</head>

<body>


<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<div id="hea">
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">

            <div class="logo">
                <a href="">
                    <img src="logo.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('coach.home')}}">Home</a></li>
                        <li class="active"><a href="{{route('coach.logout')}}">logout</a></li>
                        <li><form action='search' method="post">
                                {{ csrf_field() }}
                                <input type="text" name="q">
                                <input type="submit" value="search">
                            </form></li>

                    </ul>
                </nav>

                <a href="{{route('coach.add.post')}}" class="primary-btn signup-btn">write post</a>

            </div>
        </div>
    </header>
@yield('content')
</body>

</html>
