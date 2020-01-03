@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      		<a href="{{url('addstudent')}}" class="btn btn-danger">Add Student</a>
      		<a href="{{url('allstudent')}}" class="btn btn-info">All Student</a>
      	</p>
       <div>
         <ol>
           <li>Student name: {{ $student->name }}</li>
           <li>Student Email: {{ $student->email }}</li>
           <li>Student Phone: {{ $student->phone }}</li>
           
         </ol>
       </div>

      </div>
    </div>
  </div>

@endsection