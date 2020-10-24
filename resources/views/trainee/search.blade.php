@extends('layouts.trainee')

@section('content2')
    @if(count($posts)>0 )
        @foreach($posts as $post)
            <section class="about-section spad">

                <div class="container">
                    <div class="row">
                        @if($post->post_media)
                            <div class="col-lg-6">
                                <div class="about-pic">
                                    <img src="{{asset('coach/post/'.$post->post_media)}}" alt="">

                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-6">
                            <div class="about-text">
                                <h2>{{$post->coach_name}}</h2>

                                <p class="first-para">{{ Str::limit($post->post_description, 500)}}.</p>
                                <a href="#">read more</a><br><br>

                                <label class="up" style="display: none">{{$post->post_rank}}<i class="fa fa-thumbs-up" wedth="5"></i></label>

                                <label class="down" style="display: none">{{$post->post_rank*-1}}<i class="fa fa-thumbs-down" wedth="10"></i></label>

                                <br><br>
                                <div  class="primary-btn">
                                    <a  href="/trainee/comment{{$post->post_id}}" ><i class="fa fa-comment"></i>comment</a>
                                </div>
                                <br><br>
                                <div  @if($post->like==1)style="color:black "@endif  class="primary-btn">
                                    <a ir="{{$post->post_id}}" id="like" class="like{{$post->post_id.Auth::user()->id}}"><i class="fa fa-thumbs-up" wedth="5" ></i>like</a>

                                </div>
                                <div  class="primary-btn"  @if($post->dislike==1)style="color:black "@endif>
                                    <a ir="{{$post->post_id}}" id="dislike" class="dislike{{$post->post_id.Auth::user()->id}}"><i class="fa fa-thumbs-down" wedth="5"></i>dislike</a>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endforeach
    @else
        <section class="about-section spad">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Dont Find Any Post</h2>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
