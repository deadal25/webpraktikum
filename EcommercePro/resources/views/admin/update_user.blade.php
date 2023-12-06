<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">
    @include('admin.css')
    <style type="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .font_size{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .text_color{
        color: black;
        padding-bottom: 20px;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
     
                <div class="alert alert-success">
         
                    
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
                    
                </div>
                   
                @endif 
                <div class="div_center">
                    <h1 class="font_size">Update User</h1>

                    <form action="{{ url('/update_user_confirm', $data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                    <div class="div_design">
                        <label for="">Nama</label>
                        <input class="text_color" type="text" name="name" placeholder="Write a Title" required="" value="{{ $data->name }}">

                    </div>
                    <div class="div_design">
                        <label for="">Email</label>
                        <input class="text_color" type="text" name="email" placeholder="Write a Description" required="" value="{{ $data->email }}">

                    </div>
                    <div class="div_design">
                        <label for="">Phone</label>
                        <input class="text_color" type="number" name="phone" placeholder="Write a Price" required="" value="{{ $data->phone }}">

                    </div>
                    <div class="div_design">
                        <label for="">Address</label>
                        <input class="text_color" type="text" name="address" placeholder="Write a Discount Price" required="" value="{{ $data->address }}">

                    </div>
                   
                    {{-- <div class="div_design">
                        <label for="">Product Category :</label>
                        <select  class="text_color"  name="category" required="">
                            <option value="" selected="">Add a Category Here</option>
                            @foreach($category as $category)
                            
                            <option  class="text_color"  value="{{$category->category_name }}"></option>
                            @endforeach
                        </select> --}}
                        {{-- <input class="text_color" type="text" name="category" placeholder="Write a Category"> --}}

                    {{-- </div> --}}
                  
                    <div>
                        {{-- <label for="">Product Image Here :</label> --}}
                        <input type="submit" class="btn btn-primary" value="Update User">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

                    </div>
                </form>
                </div>
            </div>
         </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>