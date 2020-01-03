@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      		<a href="{{url('addcategory')}}" class="btn btn-danger">Add Category</a>
      		<a href="{{url('allcategory')}}" class="btn btn-info">All Category</a>
      	</p>
       <div>
         <ol>
           <li>Categary name: {{ $result->name }}</li>
           <li>Slug Name: {{ $result->slug }}</li>
           
         </ol>
       </div>

      </div>
    </div>
  </div>

@endsection