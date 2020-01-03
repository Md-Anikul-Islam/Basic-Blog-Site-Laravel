@extends('Basic')  
@section('content')
 
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($result as $information)
        <div class="post-preview">
          <a href="post.html">


            <h2 class="post-title">
              {{ $information->title }}
            </h2>
            <td><img src="{{URL::to($information->image)}}" style="height:340px;  width: 440px;"></td>


            
          </a>
          <p class="post-meta">Category
            <a href="#">  {{ $information->name }}</a>
            on Slug {{ $information->slug }}</p>
        </div>
        <hr>
          @endforeach

       
        <!-- Pager -->
        <div class="clearfix">
           {{ $result->links() }}
        </div>
      
      </div>
    </div>

@endsection


