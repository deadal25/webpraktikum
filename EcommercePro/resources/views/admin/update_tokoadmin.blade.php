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
                    <h1 class="font_size">Update Store</h1>

                    <form action="{{ url('/update_toko_confirm', $data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        

                    <div class="div_design">
                        <label for="">Nama Toko</label>
                        <input class="text_color" type="text" name="nama_store" placeholder="Write a Title" required="" value="{{ $data->nama_store }}">

                    </div>
                    <div class="div_design">
                        <label for="">Email Toko</label>
                        <input class="text_color" type="text" name="description_store" placeholder="Write a Description" required="" value="{{ $data->description_store }}">

                    </div>
                    <div class="div_design">
                        <label for="">Address Toko</label>
                        <input class="text_color" type="text" name="address" placeholder="Write address" required="" value="{{ $data->address }}">

                    </div>
                    <div class="div_design">
                        <label for="">Phone Toko</label>
                        <input class="text_color" type="number" name="phone" placeholder="phone" required="" value="{{ $data->phone }}">

                    </div>
                    <div class="div_design" style=" padding-top: 15px;">
                        <label for="">Current Product Image :</label>
                        <img style="margin:auto" height="100px" src="/store/{{ $data->image_store }}" alt="">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

                    </div>
                    
                    <div class="div_design" style=" padding-top: 15px;">
                        <label for="">Change Product Image :</label>
                        <input type="file" name="image">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

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
                        <input type="submit" class="btn btn-primary" value="Update Store">
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