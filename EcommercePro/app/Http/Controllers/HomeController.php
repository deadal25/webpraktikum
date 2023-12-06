<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\store;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        // $product=Product::all();
        $product=Product::paginate(3);
        return view('home.userpage',compact('product'));

    }

    public function redirect(){

        $usertype = Auth::user()->usertype;

        if ($usertype=='1') {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order){
                $total_revenue=$total_revenue + $order->price;
            }
            $total_delivered =order::where('delivery_status', '=', 'Sedang Dalam Pengantaran')->get()->count();
            $total_processing =order::where('delivery_status', '=', 'processing')->get()->count();
            $total_pengemasan=order::where('delivery_status', '=', 'Sedang Dalam Kemasan')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing','total_pengemasan'));
        }
        else if ($usertype=='2') {
            $product=Product::paginate(3);
            $user=auth()->user();
            // $count=cart::where('phone',$user->phone)->count();
            // $count1=favorite::where('phone',$user->phone)->count();
            return view('toko.halamantoko',compact('product'));
        }
        // else if ($usertype='0') {
        //     $product=Product::paginate(3);
        //     return view('home.userpage',compact('product'));
        // }
        else{

            $product=Product::paginate(3);
            $user=auth()->user();
            // $count=cart::where('phone',$user->phone)->count();
            // $count1=favorite::where('phone',$user->phone)->count();
        return view('home.userpage',compact('product'));
        }
    }
    
    public function product_details(Request $request, $id)
    {
    // Mendapatkan data produk dari database
    $product = product::find($id);

    // $product->product_title = Auth::store()->nama_store;
    // $product->store_id = Auth::store()->id;

    $store=store::all();
    // $product->product=$store->nama_store;
    // Mengembalikan tampilan dengan data produk dan data toko
    return view('home.product_details', compact('product', 'store'));
}

public function add_cart(Request $request, $id){
    if(Auth::id()){
        // return redirect()->back();
        
        $user=Auth::user();
        $products=product::find($id);
        $cart= new cart;
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$products->title;
        if($products->discount_price!=null){
            $cart->price=$products->discount_price * $request->quantity;
        }
        else{
            $cart->price=$products->price * $request->quantity;
        }
        $cart->image=$products->image;
        $cart->product_id=$products->id;
        $cart->quantity=$request->quantity;
        switch ($request->input('action')) {
            case 'cart':
                $cart->save();
                break;

            // Tambahkan tindakan lain jika diperlukan

            default:
                // Tindakan default jika tidak ada tindakan yang sesuai
        }
        $cart->save();
        return redirect()->back();
    }
    
    else{
        return redirect('login');
    }
}

    // public function add_cart(Request $request, $id){
    //     if(Auth::id()){
    //         // return redirect()->back();
    //         $user=Auth::user();
    //         $products=product::find($id);
    //         $cart= new cart;
    //         $cart->name=$user->name;
    //         $cart->email=$user->email;
    //         $cart->phone=$user->phone;
    //         $cart->address=$user->address;
    //         $cart->user_id=$user->id;
    //         $cart->product_title=$products->title;
    //         if($products->discount_price!=null){
    //             $cart->price=$products->discount_price * $request->quantity;
    //         }
    //         else{
    //             $cart->price=$products->price * $request->quantity;
    //         }
    //         $cart->image=$products->image;
    //         $cart->product_id=$products->id;
    //         $cart->quantity=$request->quantity;
    //         $cart->save();
    //         return redirect()->back();
    //     }
        
    //     else{
    //         return redirect('login');
    //     }
    // }

    

    public function show_cart(){

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $user=auth()->user();
            // $count=cart::where('phone',$user->phone)->count();
            // $count1=favorite::where('phone',$user->phone)->count();
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
        else{
            return redirect('login');
        }
       
    }
    // HomeController atau controller lainnya
public function calculateTotalPrice($price, $quantity) {
    return $price * $quantity;
}
// HomeController atau controller lainnya
public function update_cart(Request $request, $id){
    $cart = Cart::find($id);

    // Validasi jika produk tidak ditemukan pada cart, mungkin karena data yang tidak valid
    if (!$cart || !$cart->product) {
        return redirect()->back()->with('error', 'Invalid cart data');
    }

    // Validasi input quantity
    $validator = Validator::make($request->all(), [
        'quantity' => 'required|integer|min:1',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update data di database
    $cart->quantity = $request->quantity;

    // Hitung total harga berdasarkan quantity yang baru
    $newTotalPrice = $cart->product->discount_price ?? $cart->product->price;
    $newTotalPrice *= $request->quantity;

    // Simpan total harga yang baru ke dalam database
    $cart->price = $newTotalPrice;
    $cart->save();

    return redirect()->back()->with('message', 'Cart updated successfully');
}

// public function update_cart(Request $request, $id){
//     $cart = Cart::find($id);

//     // Validasi jika produk tidak ditemukan pada cart, mungkin karena data yang tidak valid
//     if (!$cart || !$cart->product) {
//         return redirect()->back()->with('error', 'Invalid cart data');
//     }

//     // Validasi input quantity
//     $validator = Validator::make($request->all(), [
//         'quantity' => 'required|integer|min:1',
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     // Update data di database
//     $cart->quantity = $request->quantity;

//     // Hitung subtotal berdasarkan quantity yang baru
//     $cart->price = $this->calculateTotalPrice($cart->product->discount_price ?? $cart->product->price, $request->quantity);

//     $cart->save();

//     return redirect()->back()->with('message', 'Cart updated successfully');
// }



    // public function update_cart(Request $request, $id){
    //     $cart = Cart::find($id);

    //     // dd($cart);
    
    //     // Validasi jika produk tidak ditemukan pada cart, mungkin karena data yang tidak valid
    //     if (!$cart || !$cart->product) {
    //         return redirect()->back()->with('error', 'Invalid cart data');
    //     }
    
    //     // Validasi input quantity
    //     $validator = Validator::make($request->all(), [
    //         'quantity' => 'required|integer|min:1',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    
    //     // Update data di database
    //     $cart->quantity = $request->quantity;
    
    //     // Hitung subtotal berdasarkan quantity yang baru
    //     $cart->price = $cart->product->discount_price != null
    // ? $cart->product->discount_price * $request->quantity
    // : $cart->product->price * $request->quantity;

    
    //     $cart->save();
    
    //     return redirect()->back()->with('message', 'Cart updated successfully');
    // }
    

    // public function update_cart(Request $request, $id){
    //     $cart = Cart::find($id);
    
    //     // Validasi jika produk tidak ditemukan pada cart, mungkin karena data yang tidak valid
    //     if (!$cart || !$cart->product) {
    //         return redirect()->back()->with('error', 'Invalid cart data');
    //     }
    
    //     // Validasi input quantity
    //     $validator = Validator::make($request->all(), [
    //         'quantity' => 'required|integer|min:1',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    
    //     // Update data di database
    //     $cart->quantity = $request->quantity;
    
    //     // Hitung subtotal berdasarkan quantity yang baru
    //     if ($cart->product->discount_price != null) {
    //         $cart->price = $cart->product->discount_price * $request->quantity;
    //     } else {
    //         $cart->price = $cart->product->price * $request->quantity;
    //     }
    
    //     $cart->save();
    
    //     return redirect()->back()->with('message', 'Cart updated successfully');
    // }
    
    

    public function remove_cart($id){

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();

     
    }

    public function deletecart($id){

        $data =cart::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Product Deleted to cart Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }

    public function product_search(Request $request){

        $search_text=$request->search;

        $product=product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(3);

        return view('home.userpage',compact('product'));
    }

    public function ourproduct(){

        $product = product::all();

        
            
            $product = product::paginate(3);

            return view('home.productshow', compact('product'));
        


    }
    public function product(){

        $product = product::all();

        
            
            $product = product::paginate(3);

            return view('home.productshow', compact('product'));
        


    }
    public function add_fav(Request $request, $id)
{
    if (Auth::check()) {
        $user = Auth::user();
        $product = Product::find($id);

        $favorite = new Favorite();
        $favorite->name = $user->name;
        $favorite->email = $user->email;
        $favorite->phone = $user->phone;
        $favorite->address = $user->address;
        $favorite->user_id = $user->id;
        $favorite->product_title = $product->title;
        $favorite->price = $product->discount_price;

        // $quantity = $request->input('quantity');

        // if ($product->discount_price != null) {
        //     $favorite->price = $product->discount_price * $quantity;
        // } else {
        //     $favorite->price = $product->price * $quantity;
        // }

        $favorite->image = $product->image;
        $favorite->product_id = $product->id;

        // Tindakan berdasarkan tombol yang ditekan
        switch ($request->input('action')) {
            case 'favorite':
                $favorite->save();
                // Tindakan khusus untuk tombol 'Favorite' di sini
                // Misalnya, Anda dapat menambahkan logika tambahan atau menyimpan ke tabel 'favorite'
                break;
            
            case 'cart':
                // Tindakan khusus untuk tombol 'Keranjang' di sini
                // Misalnya, Anda dapat menambahkan logika tambahan atau menyimpan ke tabel 'cart'
                break;

            // Tambahkan tindakan lain jika diperlukan

            default:
                // Tindakan default jika tidak ada tindakan yang sesuai
        }

        $favorite->save();
        return redirect()->back();
    } else {
        return redirect('login');
    }
}

    // public function add_fav(Request $request, $id){
    //     if(Auth::id()){
    //         // return redirect()->back();
    //         $user=Auth::user();
    //         $products=product::find($id);
    //         $favorite= new Favorite();
    //         $favorite->name=$user->name;
    //         $favorite->email=$user->email;
    //         $favorite->phone=$user->phone;
    //         $favorite->address=$user->address;
    //         $favorite->user_id=$user->id;
    //         $favorite->product_title=$products->title;
    //         if($products->discount_price!=null){
    //             $favorite->price=$products->discount_price * $request->quantity;
    //         }
    //         else{
    //             $favorite->price=$products->price * $request->quantity;
    //         }
    //         $favorite->image=$products->image;
    //         $favorite->product_id=$products->id;
    //         // $favorite->quantity=$request->quantity;
    //         $favorite->save();
    //         return redirect()->back();
    //     }
        
    //     else{
    //         return redirect('login');
    //     }
    // }
    public function show_fav(){

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $favorite=favorite::where('user_id','=',$id)->get();
            return view('home.favorite',compact('favorite'));
        }
        else{
            return redirect('login');
        }
       
    }
    public function deletefavorite($id){

        $data =favorite::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Product Deleted to cart Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='COD';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();

        }

        return redirect()->back()->with('message','We have receivedd your order. we eill connect with you soon...');


    }
    public function show_pesanan(){
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.show_pesanan',compact('order'));

        }
        else{
            return redirect('login');
        }
    }
    public function cancel_order($id){
        $order=order::find($id);

        $order->delivery_status='You Cancelled The Order';
        $order->save();

        return redirect()->back();

    }
    
    
}
