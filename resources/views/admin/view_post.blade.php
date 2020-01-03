@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      	<!-- 	<a href="{{url('addcategory')}}" class="btn btn-danger">Add Category</a>
      		<a href="{{url('allcategory')}}" class="btn btn-info">All Category</a> -->
      		<a href="{{url('allpost')}}" class="btn btn-success">All Post</a>
      	</p>
       <div>
       
            
           
            <h2>Post Title: {{ $result->title }}</h2>
             <p>Categary Name: {{ $result->name }}</p>
            <p> {{ $result->details }}</p>
            <td><img src="{{URL::to($result->image)}}" style="height:340px;  width: 440px;"></td>
      
           
           
       
       </div>

      </div>
    </div>
  </div>

@endsection