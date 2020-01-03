@extends('Basic')

@section('content')
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- <p>
          <a href="{{url('addcategory')}}" class="btn btn-danger">Add Category</a>
          <a href="{{url('allcategory')}}" class="btn btn-info">All Category</a>
        </p> -->
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


          @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                        </div>
                    @endif

       
        <form action="{{url('update/student/'.$student->id)}}" method="post">
          @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" name="name" value="{{$student->name}}">
            </div>
         </div>

         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="text" class="form-control" name="email" value="{{$student->email}}">
            </div>
         </div>


         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="number" class="form-control" name="phone" value="{{$student->phone}}">
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