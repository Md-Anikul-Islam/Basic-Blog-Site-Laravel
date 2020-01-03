@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      	
          <a href="{{url('allpost')}}" class="btn btn-success">All Post</a>
      	</p>
        <p>Edit Your Post</p>

        <p class="alert-success">
          <?php
          $messege=Session::get('messege');
               if($messege)
               {
                 echo $messege;
                 Session::put('messege',null);
               }
          
          ?>
          </p>
       
        <form action="{{url('update/post/'.$result->id)}}" method="post" enctype="multipart/form-data">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" name="title" value="{{$result->title}}">
            </div>

       

          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" placeholder="Post Image" name="image">
              Old Image: <img src="{{URL::to($result->image)}}" style="height: 70px; width: 70px;">

            <input type="hidden" name="old_pic" value="{{URL::to($result->image)}}">
            </div>
          </div>



          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Detail</label>
            <input type="tel" class="form-control" name="details" value="{{$result->details}}">     
            </div>
          </div>
          <br>


  

          <div id="success"></div>
          <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection