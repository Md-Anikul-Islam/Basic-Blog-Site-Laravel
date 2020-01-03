@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-16 mx-auto">
      	<p>
      		<a href="{{url('addcategory')}}" class="btn btn-danger">Add Category</a>
      		<a href="{{url('allcategory')}}" class="btn btn-info">All Category</a>
      		<a href="{{url('allpost')}}" class="btn btn-info">All Post</a>
      	</p>
        <p> Your Post</p>

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



        <table class="table table-responsive">
             
                <tr>
                  <th>Id</th>
                  <th>Category Id</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
                
                 @foreach($result as $information)
                <tr>
                  <td>{{ $information->id }}</td>
                  <td>{{ $information->name }}</td>
                  <td>{{ $information->title }}</td>
                  <td><img src="{{URL::to($information->image)}}" style="height: 70px; width: 70px;"></td>
      
                  <td>{{ $information->details }}</td>
                  



                  <td>
                   <!--  <a href="{{URL::to('edit/post/'.$information->id) }}" class="btn btn-sm btn-info">Edit</a> -->
                    <a href="{{URL::to('delete/post/'.$information->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    <a href="{{URL::to('view/post/'.$information->id) }}" class="btn btn-sm btn-success">View</a>
                   
                  </td>
                </tr>
                 @endforeach
             
        </table>  

        	
       
      </div>
    </div>
  </div>

@endsection