@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-16 mx-auto">
      	<p>
      		 <a href="{{url('addstudent')}}" class="btn btn-success">Add Student</a>
      		
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
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <th>Student Phone</th>
           
                  <th>Actions</th>
                </tr>
                
                 @foreach($student as $information)
                <tr>
                  <td>{{ $information->id }}</td>
                  <td>{{ $information->name }}</td>
                  <td>{{ $information->email }}</td>
                  <td>{{ $information->phone }}</td>
                
                  <td>
                    <a href="{{URL::to('edit/student/'.$information->id) }}" class="btn btn-sm btn-info">Edit</a>

                    <a href="{{URL::to('delete/student/'.$information->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    
                    <a href="{{URL::to('view/student/'.$information->id) }}" class="btn btn-sm btn-success">View</a>
                   
                  </td>
                </tr>
                 @endforeach
             
        </table>  

        	
       
      </div>
    </div>
  </div>

@endsection