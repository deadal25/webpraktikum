<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-H5k5IaHzERf7ZpNiVDTm3SyFctsgYih0P2Wy9I3VH6cXTg0iVSdz1UqnJqwMVfU1q7V62eAKL6iF2/3zEN8Gw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      {{-- ICON --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

      <style type="text/css">
        .center{
            margin:auto;
            width:70%;
            padding:20px;
            text-align: center;
        }
        table,th,td{
            border:1px solid;
            margin: auto;
        }
        .th_deg{
            padding:10px;
            background-color: skyblue;

        }
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold; 
            padding-bottom: 15px;
        }
        .img_size{
            width: 200px;
            height: 100px;
        }

        
        </style>
   </head>
   <body>

         <!-- header section strats -->
        @include('toko.header')
       


        <div class="center">
            <h1 class="title_deg">All Orders</h1>
            <table>

                <tr>
                    <th class="th_deg">Name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Address</th>
                    <th class="th_deg">Phone</th>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment_Status</th>
                    <th class="th_deg">Delivery_Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Status_Pesanan</th>
                    <th class="th_deg">Cancel_Order</th>
                </tr>

                    @foreach($order as $order)
                        
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td ><img class="img_size" src="/product/{{ $order->image }}" alt=""> </td>
                        <td>
                            @if($order->delivery_status=='processing')
                            <a href="{{ url('pesanan', $order->id) }}" onclick="return confirm('Are you sure to kemas??')" class="btn btn-primary">Proses Kemasan</a>
                            @else
                            <p Style="color: rgb(30, 255, 0);">Proses Kemasan</p>
                            @endif
                        </td>
                        <td>
                            @if($order->delivery_status=='processing')
                            <a onclick="return confirm('Are yous sure to cancelled this order???')" class="btn btn-danger" href="{{ url('cancel_order',$order->id) }}">Cancel</a>
                            @else
                            <p Style="color: blue;">Not Allowed</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
            </table>
        
        
    
    
    </div>
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>