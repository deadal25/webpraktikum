<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\store;
use App\Models\favorite;
use App\Models\cart;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use Auth;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{ 
    
    public function view_home(){
        $category=category::all();

        return view('toko.addproduct', compact('category'));
    }
    // public function addproduct(Request $request){
    //     try {
    //         // Validasi data
    //         $request->validate([
    //             'title' => 'required',
    //             'description' => 'required',
    //             'price' => 'required|numeric',
    //             'quantity' => 'required|numeric',
    //             'discount_price' => 'numeric',
    //             'category' => 'required',
    //             'nama_store' => 'required',
    //             'description_store' => 'required',
    //             'address' => 'required',
    //             'phone' => 'required',
    //             // Add other validations as needed
    //         ]);
    
    //         // Mulai transaksi
    //         DB::beginTransaction();
    
    //         // Buat toko baru
    //         $store = new Store([
    //             'nama_store' => $request->nama_store,
    //             'description_store' => $request->description_store,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //         ]);
    //         $store->save();
    
    //         // Buat produk baru dan hubungkan dengan toko
    //         $product = new Product([
    //             'title' => $request->title,
    //             'description' => $request->description,
    //             'price' => $request->price,
    //             'quantity' => $request->quantity,
    //             'discount_price' => $request->discount_price,
    //             'category' => $request->category,
    //         ]);
    
    //         $store->products()->save($product);
    
    //         // Handle image upload (assuming $request->image is present)
    //         $image = $request->image;
    //         $imagename = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move('product', $imagename);
    //         $product->image = $imagename;
    
    //         $product->save();
    
    //         // Commit transaksi
    //         DB::commit();
    
    //         return redirect()->back()->with('message', 'Product Added Successfully');
    //     } catch (\Exception $e) {
    //         // Rollback transaksi jika terjadi kesalahan
    //         DB::rollBack();
    
    //         Log::error("Error during product addition: " . $e->getMessage());
    //         return redirect()->back()->with('error', 'An error occurred during product addition. Please try again.');
    //     }
    // }
    

    public function addproduct(Request $request){
        $product = new product;
        $store = new store;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;

        $product->store_id=$request->store_id;
        $store->nama_store=$request->nama_store;
        $store->description_store=$request->description_store;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();  
        $request->image->move('product', $imagename);  
        $product->image=$imagename;
           
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');;
    }
    // public function addproduct(Request $request){
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|numeric',
    //         'discount_price' => 'numeric',
    //         'category' => 'required',
    //         'nama_store' => 'required',
    //         'description_store' => 'required',
    //         'address' => 'required', // Add this line for address validation
    //         'phone' => 'required',   // Add this line for phone validation
    //         // Add other validations as needed
    //     ]);
        
    //     $product = new Product;
    //     $store = new Store;
    
    //     $product->title = $request->title;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->quantity = $request->quantity;
    //     $product->discount_price = $request->discount_price;
    //     $product->category = $request->category;
    
    //     // Assuming there is a relationship between Product and Store
    //     // and the foreign key is store_id in the products table
    //     $store->nama_store = $request->nama_store;
    //     $store->description_store = $request->description_store;
    //     $store->address = $request->address;
    //     $store->phone = $request->phone;
    //     $store->save();
    
    //     $product->store()->associate($store); // Associate the product with the store
    //     $product->save();
    
    //     // Handle image upload (assuming $request->image is present)
    //     $image = $request->image;
    //     $imagename = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move('product', $imagename);
    //     $product->image = $imagename;
        
    //     $product->save();
    
    //     return redirect()->back()->with('message', 'Product Added Successfully');
    // }
    
//     public function addproduct(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'nama_store' => 'required|string',
//         'description_store' => 'required|string',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         // Add other validation rules for your fields
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator)
//             ->withInput($request->all());
//     }

//     $user = Auth::user();
//     if (!$user) {
//         // Pengguna tidak terotentikasi
//         return redirect()->back()->with('error', 'Unauthorized access');
//     }

//     $store = new Store;
//     $store->nama_store = $request->nama_store;
//     $store->description_store = $request->description_store;

//     $user->stores()->save($store);
//     // dd($user);

//     $product = new Product;
//     $product->title = $request->title;
//     $product->description = $request->description;
//     $product->price = $request->price;
//     $product->quantity = $request->quantity;
//     $product->discount_price = $request->discount_price;
//     $product->category = $request->category;

//     $image = $request->image;
//     $imagename = time() . '.' . $image->getClientOriginalExtension();
//     $image->move('product', $imagename);
//     $product->image = $imagename;

//     $product->stores()->attach($store);
//     $product->save();


//     return redirect()->back()->with('message', 'Product Added Successfully');
// }

//     public function addproduct(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'nama_store' => 'required|string',
//         'description_store' => 'required|string',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         // Add other validation rules for your fields
//     ]);
    
//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator)
//             ->withInput($request->all());
//     }

//     $user = Auth::user();
//     if (!$user) {
//         // Pengguna tidak terotentikasi
//         return redirect()->back()->with('error', 'Unauthorized access');
//     }
//     $stores = $user->stores;
//     $store = new Store;
//     $store->nama_store = $request->nama_store;
//     $store->description_store = $request->description_store;

//     $user->stores()->save($store);
//     $store->save();

//     $product = new Product;
//     $product->title = $request->title;
//     $product->description = $request->description;
//     $product->price = $request->price;
//     $product->quantity = $request->quantity;
//     $product->discount_price = $request->discount_price;
//     $product->category = $request->category;

//     $image = $request->image;
//     $imagename = time() . '.' . $image->getClientOriginalExtension();
//     $request->image->move('product', $imagename);
//     $product->image = $imagename;

//     $product->store()->associate($store);
//     $product->save();

//     return redirect()->back()->withErrors($validator)->withInput($request->all());


//     return redirect()->back()->with('message', 'Product Added Successfully');
// }

//     public function addproduct(Request $request)
// {
//     $user = Auth::user();
//     $store = new Store;
//     $store->nama_store = $request->nama_store;
//     $store->description_store = $request->description_store;

//     // $store->user()->associate($user);
//     $user->stores()->save($store);
//     $store->save();

//     $product = new Product;
//     $product->title = $request->title;
//     $product->description = $request->description;
//     $product->price = $request->price;
//     $product->quantity = $request->quantity;
//     $product->discount_price = $request->discount_price;
//     $product->category = $request->category;
//     // $image=$request->image;
//     $image=$request->image;
//     $imagename = time().'.'.$image->getClientOriginalExtension();  
//     $request->image->move('product', $imagename);
//     $product->image = $imagename; // Assuming you have defined $imagename earlier

    // Associate the product with the store
//     $product->store()->associate($store);

//     $product->save();

//     return redirect()->back()->with('message', 'Product Added Successfully');
// }

    // public function addproduct(Request $request){
    //     $product = new product;
    //     $store= new store;
    //     $product->title=$request->title;
    //     $product->description=$request->description;
    //     $product->price=$request->price;
    //     $product->quantity=$request->quantity;
    //     $product->discount_price=$request->discount_price;
    //     $product->category=$request->category;
    //     $store->nama_store=$request->nama_store;
    //     $store->description_store=$request->description_store;

    //     $image=$request->image;
    //     $imagename = time().'.'.$image->getClientOriginalExtension();  
    //     $request->image->move('product', $imagename);  
    //     $product->image=$imagename;
           
    //     $product->save();
    //     return redirect()->back()->with('message', 'Product Added Successfully');;
    // }
    public function showproduct(Request $request){
        
        $data =product::all();
        // $store = store::find($id);

        // $store =store::find($id);
        
        return view('toko.showproduct', compact('data'));
    }
    public function update_product($id){

        $data =product::find($id);
        $category=category::all();


        // $data =product::all();

        return view('toko.update_product',compact('data','category'));

    }
    public function updateproduct(Request $request , $id){

        $data =product::find($id);
        $category=category::all();

        // $data=new product;
        // $storeId=store::all();
        
        $data->title=$request->title;
        
        $data->price=$request->price;
        
        $data->category=$request->category;
        
        $data->discount_price=$request->discount_price;
        
        $data->description=$request->description;
        
        $data->quantity=$request->quantity;
        
        $data->store_id = $request->store_id;

        $image=$request->image;

        
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
        
            $request->image->move('product', $imagename);
            
            $data->image=$imagename;
        
        }
        
       

        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'Product Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function deleteproduct($id){

        $data =product::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Product Deleted Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }
    public function showtoko(Request $request){
        
        // $data= store::find($id);
        $data= store::where('nama_store', '!=', null)->get();
        
        return view('toko.showtoko', compact('data'));
    }
    public function addtoko(){
        $category=category::all();

        return view('toko.addtoko', compact('category'));
    }
    public function addtokoonline(Request $request){
        $store = new store;
        $store->nama_store=$request->nama_store;
        $store->description_store=$request->description_store;
        $store->address=$request->address;
        $store->phone=$request->phone;
        // $store->discount_price=$request->discount_price;
        // $store->category=$request->category;

        $image_store=$request->image_store;
        $imagename = time().'.'.$image_store->getClientOriginalExtension();  
        $request->image_store->move('store', $imagename);  
        $store->image_store=$imagename;
           
        $store->save();
        return redirect()->back()->with('message', 'store Added Successfully');;
    }
    public function update_toko($id){

        $data =store::find($id);
        // $category=category::all();


        // $data =product::all();

        return view('toko.update_toko',compact('data'));

    }
    public function edittoko(Request $request , $id){

        $data =store::find($id);
        // $category=category::all();

        // $data=new product;
       
        
        $data->nama_store=$request->nama_store;
        $data->description_store=$request->description_store;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $image_store=$request->image_store;
        
        if($image_store){

            $imagename=time().'.'.$image_store->getClientOriginalExtension();
        
            $request->image_store->move('store', $imagename);
            
            $data->image_store=$imagename;
        
        };
        
       

        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'Product Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function showproducthome(Request $request){
        
        $product =product::all();
        // $store = store::find($id);

        // $store =store::find($id);
        
        return view('toko.showproducthome', compact('product'));
    }
    public function toko_favorite(){

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $favorite=favorite::where('user_id','=',$id)->get();
            return view('toko.favorite',compact('favorite'));
        }
        else{
            return redirect('login');
        }
       
    }
    public function addtoko_favorite(Request $request, $id)
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

public function productdetails(Request $request, $id)
    {
    // Mendapatkan data produk dari database
    $product = product::find($id);

    $store = DB::table('products')
        ->join('stores', 'products.store_id', '=', 'stores.id')
        ->where('stores.id', '=', $product->store_id)
        ->select('stores.nama_store','stores.image_store', 'stores.description_store')
        ->first();
    // $store = store::where('')->first();
        // ->all();
        // ->second();

    // Mengembalikan tampilan dengan data produk dan data toko
    return view('toko.productdetails', compact('product', 'store'));
}
public function show_carttoko(){

    if(Auth::id())
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('toko.show_carttoko',compact('cart'));
    }
    else{
        return redirect('login');
    }
   
}
public function orderpesanan(){

    $order=order::all();
    return view('toko.pesanan',compact('order'));
}
public function pesanan($id){
    $order = order::find($id);
    $order->delivery_status="Sedang Dalam Kemasan";
    $order->payment_status="Sudah Bayar";
    $order->save();

    return redirect()->back();

}

public function productnya(Request $request){
        
    $product =product::all();
    // $store = store::find($id);

    // $store =store::find($id);
    
    return view('toko.productnya', compact('product'));
}
public function product_searchtoko(Request $request){

    $search_text=$request->search;

    $product=product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(3);

    return view('toko.halamantoko',compact('product'));
}
public function add_carttoko(Request $request, $id){
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
    
    
    
    

}
