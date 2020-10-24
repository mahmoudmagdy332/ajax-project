@extends('layouts.coach')

@section('content')
        <section class="register-section spad">
    <div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create post</h1>
<form method="post" action="{{route('coach.store.post')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>

    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="description" ></textarea>
    		    </div>

    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>
    		     <div class="form-group">
                         <label for="description">Add  picture</label>
                         <input type="file" placeholder="Add profile picture" name="file"  />
    		    </div>
    		    <div class="form-group">

                        <button type="submit" class="btn btn-primary" id="save">
    		            Create
    		        </button>
    		    </div>

</form>
		</div>

	</div>
</div>
        </section>

@endsection
