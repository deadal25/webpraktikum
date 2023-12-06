<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style type="text/css">
        
    
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold; 
            padding-bottom: 5px;
        }
        .table_deg{
            border: 2px solid skyblue;
            width: 80%;
            margin: auto;
            margin-top: 20px;
            text-align: center;
            background-color: skyblue
    
    
        }
        .th_deg{
            background-color: rgb(130, 149, 156);
        }
        .img_size{
            width: 200px;
            height: 100px;
        }
        
        </style>

</head>
<body>
    @include('toko.header')
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success mx-auto" style="width: 50%;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="title_deg">All Orders</h1>
                <table class="table_deg">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Status</th>
                        {{-- <th>Remove</th> --}}
                    </tr>
                    @foreach($order as $order)
                        
                    <tr class="th_deg">
                        <td>{{ $order->name}}</td>
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
                            <p style="color:green">Proses Kemasan</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
            </div>
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
        
           Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        
        </p>
     </div>
    

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>
</html>
