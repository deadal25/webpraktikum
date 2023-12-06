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
                        <td style="padding: 20px;">Name</td >
                            <td style="padding: 20px;">email</td >
                                <td style="padding: 20px;">phone</td >
                                    <td style="padding: 20px;">address</td >
                                        {{-- <td style="padding: 20px;">Price</td > --}}
                                            {{-- <td style="padding: 20px;">Diskon Price</td > --}}
                                        {{-- <td style="padding: 20px;">Product Image</td> --}}
                                        <td style="padding: 20px;">Edit</td>
                                        <td style="padding: 20px;">Delete</td>
                    </tr>

                    @foreach($data as $user)

                    <tr align="center" style="background-color: rgb(53, 66, 65);">
                        <td style="padding: 20px;" width="150px">{{ $user->name }} </td>
                        <td style="padding: 20px;" width="150px">{{ $user->email }} </td>
                        <td style="padding: 20px;" width="150px">{{ $user->phone }} </td>
                        <td style="padding: 20px;" width="150px">{{ $user->address }} </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('update_user', $user->id) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are yous Sure?')" href="{{ url('deleteuser', $user->id) }}">Delete</a>
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