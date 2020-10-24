@extends('layouts.coach')

@section('content')

 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">

                        <img src="../trainer-1.jpg" alt="">
                        <div class="trainer-text">
                            <h5>{{$coach->coach_name}}</h5>

                            <p></p>

                            </div>
                        </div>
                       </a>
                    </div>
                </div>


        </div>

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
                        <p class="first-para">{{ Str::limit($post->post_description, 300)}}</p>


                   <br><br>
                   <div>
                   <div class="container">
            <div class="nav-men">
                <nav class="mainmenu mobile-menu">
                    <ul class="hidden"id="fo">
                          <form  action="comment/{{$post->post_id}}" method="post" >
                   {{ csrf_field() }}
                        <li>
                            <input type="text" class="form-control" name="description" >
                        </li>
                        <li><input type="submit" value="send" class="btn btn-primary"></li>
                                      </form>

                    </ul>

                </nav>

             </div>



                    <script type="text/javascript">
                  function coment(){
                 document.getElementById("fo").style.display="block";
                   }
                    </script>
                    </div>
                </div>
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

