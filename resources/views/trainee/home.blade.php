
@extends('layouts.trainee')

@section('content2')
<section class="trainer-section spad" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>EXPERT TRAINERS</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($coaches as $coach)
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <a href="profile{{$coach->id}}">
                            <img src="../trainer-1.jpg" alt="">
                            <div class="trainer-text">
                                <h5>{{$coach->coach_name}}</h5>
                                <span>Leader</span>
                                <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                    voluptatem.</p>
                                <div class="trainer-social">
                                    <a idpr="{{ $coach->id}}" id="follow" @if($coach->trainee_id==Auth::user()->id)style="display: none;"@endif class="follow{{$coach->id}}"> follow</a>
                                    <a idpr="{{ $coach->id}}" id="unfollow" @if($coach->trainee_id!=Auth::user()->id)style="display: none;"@endif class="unfollow{{$coach->id}}"> unfollow</a>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<div class="content">

</div>


                    <script type="text/javascript">
                        var start=0;
                        var limit=3;
                        var reachedMax=false;
                        $(window).scroll(function () {
                            if($(window).scrollTop() + $(window).height() == $(document).height()) {
                                getData();
                            }
                        });
                        $(document).ready(function () {
                            getData();
                        });
                        function getData(){
                            if(reachedMax){
                                return;
                            }
                            $.ajax({
                                url:'/trainee/home',
                                method:'post',
                                dataType:'text',
                                data:{
                                    '_token':"{{csrf_token()}}",
                                    getdata:1,
                                    start:start,
                                    limit:limit
                                },
                                success:function (response) {
                                    if(response=='reachedMax')
                                        reachedMax=true;
                                    else{
                                        start+=limit;
                                        $('.content').append(response);
                                    }
                                }
                            });
                        }
                    </script>

@endsection
