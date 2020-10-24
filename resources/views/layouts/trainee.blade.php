<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport Coach</title>

    <!-- Google Font -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('click','#follow',function(e){
            e.preventDefault();
            var x= $(this).attr('idpr');
            $.ajax({

                type: 'post',
                url:"/trainee/follow",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id':x

                },
                success:function(data){
                    $('#unfollow').show();
                    $('#follow').hide();
                    $('.unfollow'+x).show();
                    $('.follow'+x).hide()

                }


            });
        });
        $(document).on('click','#unfollow',function(e){
            e.preventDefault();
            var x= $(this).attr('idpr');
            $.ajax({

                type: 'post',
                url:"/trainee/unfollow",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id':x

                },
                success:function(data){
                    $('#follow').show();
                    $('#unfollow').hide();
                    $('.unfollow'+x).hide();
                    $('.follow'+x).show()
                }

            });

        });


        $(document).on('click','#like',function(e){
            e.preventDefault();
            var x= $(this).attr('ir');
            $.ajax({

                type: 'post',
                url:"/trainee/like",
                data:{
                    '_token':"{{csrf_token()}}",
                    'id':x

                },
                success:function(data){
                    if(data.like==0){
                        $('.like'+x+data.id).css({'color':'black'});
                        $('.dislike'+x+data.id).css({'color':'white'});
                    }
                    if(data.like==1){
                        $('.dislike'+x+data.id).css({'color':'white'});
                        $('.like'+x+data.id).css({'color':'white'});
                    }
                  if(data.rank>0)


                  $('.up').show();
                }


            });
        });
        $(document).on('click','#dislike',function(e) {
            e.preventDefault();
            var x = $(this).attr('ir');
            $.ajax({

                type: 'post',
                url: "/trainee/dislike",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': x

                },
                success: function (data) {
                    if(data.dislike==0){
                        $('.like'+x+data.id).css({'color':'white'});
                        $('.dislike'+x+data.id).css({'color':'black'});
                    }
                    if(data.dislike==1){
                        $('.dislike'+x+data.id).css({'color':'white'});
                        $('.like'+x+data.id).css({'color':'white'});
                    }
                }

            });
        });
    </script>
</head>

<body>

<div id="hea">
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">

            <div class="logo">
                <a href="">
                    <img src="../logo.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('trainee.home')}}">Home</a></li>
                        <li class="active"><a href="{{route('trainee.logout')}}">logout</a></li>
                        <li><form action='{{route('trainee.search')}}' method="post">
                                {{ csrf_field() }}
                                <input type="text" name="q">
                                <input type="submit" value="search">
                            </form></li>

                    </ul>
                </nav>


                <a href="{{route('question.add')}}" class="primary-btn signup-btn">ask quetion</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
</div>
@yield('content2')
</body>
</html>
