@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      		<a href="{{url('addcategory')}}" class="btn btn-danger">Add Category</a>
      		<a href="{{url('allcategory')}}" class="btn btn-info">All Category</a>
          <a href="{{url('allpost')}}" class="btn btn-success">All Post</a>
      	</p>
        <p>Write Your Post</p>

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
       
        <form action="{{url('save-post')}}" method="post" enctype="multipart/form-data">
         @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" name="title" placeholder="Post Title">
            </div>

       

          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" placeholder="Post Image" name="image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Detail</label>
              <input type="tel" class="form-control" placeholder="Post Detail" name="details">     
            </div>
          </div>
          <br>


         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
            <label>Category</label>
             <select class="form-control" name="category_id">
              @foreach($result as $post)
             	<option value="{{ $post->id }}">{{ $post->name }}</option>            
              @endforeach           	
             </select>
            </div>
          </div>     
          <br>

          <div id="success"></div>
          <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection