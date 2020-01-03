@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<p>
      	
           <a href="{{url('allstudent')}}" class="btn btn-success">All Student</a>
      	</p>
        <h3>Add Student Data</h3>

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


					@if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                        </div>
                    @endif

        <form action="{{url('save-student')}}" method="post">
        	@csrf


          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" name="name" placeholder="Student Name">
            </div>
         </div>

        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="text" class="form-control" name="email" placeholder="Student Email">
            </div>
         </div>

         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="number" class="form-control" name="phone" placeholder="Student Phone">
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