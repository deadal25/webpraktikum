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
      <title>ISEKAI THRIFT</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   </head>
   <body>
    <style>
        .cart-form {
    margin-top: 10px; /* Sesuaikan sesuai kebutuhan */
}

.btn-favorite,
.btn-cart {
    width: 100%;
    padding: 10px;
    background-color: #3498db; /* Warna latar sesuaikan dengan preferensi Anda */
    color: #fff; /* Warna teks sesuaikan dengan preferensi Anda */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-favorite:hover,
.btn-cart:hover {
    background-color: #2980b9; /* Warna latar saat hover sesuaikan dengan preferensi Anda */
}

.number {
    height: 50px;
}

/* .row {
    display: flex;
    justify-content: space-between;
} */


    </style>
      <div class="hero_area">
         <!-- header section strats -->
        @include('toko.header')
         <!-- end header section -->
         <div class="container" style=" padding:30px">
            <div class="img-box" style="padding:20px;">
                <img src="product/{{ $product->image }}" alt="" width="800px;">
            </div>
            <div class="container detail-box">
                <h5>{{ $product->title }}</h5>
        
                @if($product->discount_price!=null)
                    <h6 style="color: red">
                        Harga Diskon
                        <br>
                        Rp.{{ $product->discount_price }}
                    </h6>
                    <h6 style="text-decoration: line-through; color:blue;">
                        Harga
                        <br>
                        Rp.{{ $product->price }}
                    </h6>
                @else
                    <h6 style="color:blue">
                        Harga
                        <br>
                        Rp.{{ $product->price }}
                    </h6>
                @endif
        
                <h6>Kategori Produk: {{ $product->category }}</h6>
                <h6>Detail Produk: {{ $product->description }}</h6>
                <h6>Jumlah Tersedia: {{ $product->quantity }}</h6>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Form untuk menambahkan ke Keranjang -->
                    <div class="col-md-6">
                        <form action="{{ url('add_carttoko', $product->id) }}" method="POST" class="cart-form d-flex">
                            @csrf

                            <input type="number" name="quantity" value="1" min="1" class="number">
                            <div>
                                <input type="submit" name="action" value="add to cart" class="btn-cart py">
                            </div>
                        </form>
                    </div>


                    <div class="col-md-6 justify-content-start d-flex">
                        <!-- Form untuk menambahkan ke Favorite -->
                        <form action="{{ url('addtoko_favorite', $product->id) }}" method="POST" class="cart-form">
                            @csrf
                            
                            <div class="">
                                <input type="submit" name="action" value="add to favorite" class="btn-favorite">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
        {{-- <div class="container"> --}}
            <div class="container w-50">
                <div class="card mb-3">
                    <div class="row">
                      <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <img width="200px" src="store/{{ $store->image_store }}" class="img-fluid rounded-start" >
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <h5 class="card-title">{{ $store->nama_store }}</h5>
                          <p class="card-text">Deskripsi:
                            <br>{{ $store->description_store }}</p>
                          {{-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> --}}
                        </div>
                      </div>
                    </div>
                </div>            
            </div>
            {{-- <div style="display: flex; align-items: center;">
                <div style="flex: 0 0 auto; margin-right: 10px;">
                    <h6 style="font-size: 18px; background-color: #f6f3f3; padding: 10px; border-radius: 5px; margin: 0;">
                        Gambar Toko: <img src="store/{{ $store->image_store }}" alt="" style="max-width: 100px;">
                    </h6>
                </div>
                <div>
                    <h7 style="font-size: 18px; background-color: #fcfafa; padding: 10px; border-radius: 5px; margin: 0;">
                        Nama Toko: {{ $store->nama_store }}
                    </h7>
                    <br>
                    <h8 style="font-size: 18px; background-color: #fffefe; padding: 10px; border-radius: 5px; margin: 0;">
                        Deskripsi Toko: {{ $store->description_store }}
                    </h8>
                </div>
            </div> --}}
            
        {{-- </div> --}}
        {{-- @include('home.product') --}}
        
      
      <!-- footer start -->
      {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
        <p class="mx-auto">© 2023 All Rights Reserved By Al Qadri
        
           Distributed By Al Qadri
        
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

{{-- 
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
      <title>ISEKAI STORE</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   </head>
   <body>
    <style>
        .cart-form {
            margin-top: 10px; /* Sesuaikan sesuai kebutuhan */
        }

        .btn-favorite,
        .btn-cart {
            width: 100%;
            padding: 10px;
            background-color: #3498db; /* Warna latar sesuaikan dengan preferensi Anda */
            color: #fff; /* Warna teks sesuaikan dengan preferensi Anda */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-favorite:hover,
        .btn-cart:hover {
            background-color: #2980b9; /* Warna latar saat hover sesuaikan dengan preferensi Anda */
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-md-4 {
            width: 32%; /* Atur lebar kolom sesuai dengan preferensi Anda */
        }

    </style>
    <div class="hero_area">
        <!-- header section strats -->
        @include('toko.header')
        <!-- end header section -->

        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px">
            <div class="img-box" style="padding:20px;">
                <img src="product/{{ $product->image }}" alt="">
            </div>
            <div class="detail-box">
                <h5>{{ $product->title }}</h5>

                @if($product->discount_price!=null)
                    <h6 style="color: red">
                        Harga Diskon
                        <br>
                        {{ $product->discount_price }}
                    </h6>
                    <h6 style="text-decoration: line-through; color:blue;">
                        Harga
                        <br>
                        {{ $product->price }}
                    </h6>
                @else
                    <h6 style="color:blue">
                        Harga
                        <br>
                        {{ $product->price }}
                    </h6>
                @endif

                <h6>Kategori Produk: {{ $product->category }}</h6>
                <h6>Detail Produk: {{ $product->description }}</h6>
                <h6>Jumlah Tersedia: {{ $product->quantity }}</h6>

                <form action="{{ url('addtoko_favorite', $product->id) }}" method="POST" class="cart-form">
                    @csrf
                    <div class="row"> --}}
                        {{-- <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                        </div> --}}
                        {{-- <div class="col-md-12">
                            <input type="submit" name="action" value="add to favorite" class="btn-favorite">
                        </div>
                    </div>
                </form>
                
                <!-- Form untuk menambahkan ke Keranjang -->
                <form action="{{ url('add_carttoko', $product->id) }}" method="POST" class="cart-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width: 420px">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="action" value="add to cart" class="btn-cart">
                        </div>
                    </div>
                </form> --}}

                {{-- <h6>Nama Toko: {{ $store->nama_store }}</h6> --}}
                {{-- <h6 style="font-size: 18px; background-color: #c22323; padding: 10px; border-radius: 5px;">
                        Gambar Toko: <img src="store/{{ $store->image_store }}" alt="">
                </h6>
                <h7 style="font-size: 18px; background-color: #c22323; padding: 10px; border-radius: 5px;">
                    Nama Toko: {{ $store->nama_store }}
                </h7>
                <h8 style="font-size: 18px; background-color: #c22323; padding: 10px; border-radius: 5px;">
                    Nama Toko: {{ $store->description_store }}
                </h8> --}}
                {{-- <div style="display: flex; align-items: center;">
                    <div style="flex: 0 0 auto; margin-right: 10px;">
                        <h6 style="font-size: 18px; background-color: #f6f3f3; padding: 10px; border-radius: 5px; margin: 0;">
                            Gambar Toko: <img src="store/{{ $store->image_store }}" alt="" style="max-width: 100px;">
                        </h6>
                    </div>
                    <div>
                        <h7 style="font-size: 18px; background-color: #fcfafa; padding: 10px; border-radius: 5px; margin: 0;">
                            Nama Toko: {{ $store->nama_store }}
                        </h7>
                        <br>
                        <h8 style="font-size: 18px; background-color: #fffefe; padding: 10px; border-radius: 5px; margin: 0;">
                            Deskripsi Toko: {{ $store->description_store }}
                        </h8>
                    </div>
                </div>
                 --}}
                

                {{-- @php
                $store = Store::first();
                @endphp --}}


                {{-- @if(isset($store))
                    <div>
                        <h3>Informasi Toko</h3>
                        <p>Nama Toko: {{ $store->nama_store }}</p>
                        <p>Deskripsi Toko: {{ $store->description_store }}</p>
                        <p>Alamat: {{ $store->address }}</p>
                        <p>Telepon: {{ $store->phone }}</p>
                        <!-- Tampilkan gambar toko jika ada -->
                        @if($store->image_store)
                            <img src="{{ asset('store/' . $store->image_store) }}" alt="Image Toko">
                        @endif --}}
                    {{-- </div> --}}
                {{-- @endif --}}
            {{-- </div>
        </div> --}}

        <!-- footer start -->
        {{-- @include('home.footer') --}}
        <!-- footer end -->
        {{-- <div class="cpy_">
            <p class="mx-auto">© 2023 All Rights Reserved By Free Html Templates
            
               Distributed By AL QADRI
            
            </p>
         </div>>
        <!-- jQuery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
    </body>
</html> --}}
