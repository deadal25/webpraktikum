<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div style="padding-top:30px;" class="container-fluid page-body-wrapper">
                <div class= "container" align="center"> 

                @if(session()->has('message'))
     
                <div class="alert alert-success">
         
                    
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
                    
                </div>
                   
                @endif 
                <table class="center">
                    <tr style="background-color: grey;">
                        <td style="padding: 20px;">Image Toko</td >
                            <td style="padding: 20px;">Nama Toko</td >
                                <td style="padding: 20px;">Deskripsi Toko</td >
                                    <td style="padding: 20px;">Address Toko</td >
                                        <td style="padding: 20px;">Phone Toko</td >
                                        {{-- <td style="padding: 20px;">Price</td > --}}
                                            {{-- <td style="padding: 20px;">Diskon Price</td > --}}
                                        {{-- <td style="padding: 20px;">Product Image</td> --}}
                                        <td style="padding: 20px;">Edit</td>
                                        <td style="padding: 20px;">Delete</td>
                    </tr>

                    @foreach($data as $store)

                    <tr align="center" style="background-color: rgb(53, 66, 65);">
                        <td style="padding: 20px;" width="150px">
                            <img height="400px" width="300px" src="/store/{{ $store->image_store }}" >
                            </td>
                        <td style="padding: 20px;" width="150px">{{ $store->nama_store }} </td>
                        <td style="padding: 20px;" width="150px">{{ $store->description_store }} </td>
                        <td style="padding: 20px;" width="150px">{{ $store->address }} </td>
                        <td style="padding: 20px;" width="150px">{{ $store->phone }} </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('update_tokoadmin', $store->id) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are yous Sure?')" href="{{ url('deletetokoadmin', $store->id) }}">Delete</a>
                        </td>

                    </tr>
                    
                    
        
                                
                    @endforeach
                </table>
                </div>
                </div>
                    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>