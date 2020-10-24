
@extends('layouts.trainee')

@section('content2')
    <section class="register-section spad">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2">

                    <h5>comment</h5>

                    <form  action="comment{{$post}}" method="post">
                        {{ csrf_field() }}


                        <div class="form-group">

                            <textarea rows="3" class="form-control" name="description" ></textarea>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="hea">
        <!-- Header Section Begin -->

        <div class="table-history-user">
            <table class="">
                @foreach($comments as $comment)
                    <tr>


                        <td>{{$comment->comment_description}}</td>


                    </tr>
                @endforeach
            </table>
        </div>
@endsection
