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
                  <th>Category Name</th>
                  <th>Slug Name</th>
                  <th>Actions</th>
                </tr>
                
                @foreach($result as $information)
                <tr>
                  <td>{{ $information->id }}</td>
                  <td>{{ $information->name }}</td>
                  <td>{{ $information->slug }}</td>
                  <td>
                    <a href="{{URL::to('edit/category/'.$information->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{URL::to('delete/category/'.$information->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    <a href="{{URL::to('view/category/'.$information->id) }}" class="btn btn-sm btn-success">View</a>
                   
                  </td>
                </tr>
                @endforeach
        </table>  

        	
       
      </div>
    </div>
  </div>

@endsection