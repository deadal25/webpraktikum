<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\store;
use App\Models\Order;
use App\Models\user;

class AdminController extends Controller
{

    public function view_category(){

        $data=category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $data=new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function delete_category($id){

        $data =category::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Category Deleted Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }

    public function view_product(){
        $category=category::all();

        return view('admin.product', compact('category'));
    }
    // public function add_product(Request $request){
    //     $product = new Product;
    //     $store = new Store;
    
    //     // Set product details
    //     $product->title = $request->title;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->quantity = $request->quantity;
    //     $product->discount_price = $request->discount_price;
    //     $product->category = $request->category;
    
    //     // Set store details
    //     $store->image_store = $request->image_store;
    
    //     // Validate if 'nama_store' is provided
    //     if (!empty($request->nama_store)) {
    //         $store->nama_store = $request->nama_store;
    //     } else {
    //         // Handle the case where 'nama_store' is empty or null
    //         return redirect()->back()->with('error', 'Nama Store cannot be empty')->withInput();
    //     }
    
    //     $store->description_store = $request->description_store;
    //     $store->address = $request->address;
    //     $store->phone = $request->phone;
    
    //     // Save the store first to get the store_id
    //     $store->save();
    
    //     // Set the store_id for the product
    //     $product->store_id = $store->id;
    
    //     // Handle image upload
    //     $image = $request->image;
    //     $imagename = time() . '.' . $image->getClientOriginalExtension();
    //     $request->image->move('product', $imagename);
    //     $product->image = $imagename;
    
    //     // Save the product
    //     $product->save();
    
    //     return redirect()->back()->with('message', 'Product Added Successfully');
    // }
    
    // public function add_product(Request $request){
    //     $product = new Product;
    //     $store = new Store;
    
    //     // Set product details
    //     $product->title = $request->title;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->quantity = $request->quantity;
    //     $product->discount_price = $request->discount_price;
    //     $product->category = $request->category;
    
    //     // Set store details
    //     $store->image_store=$request->image_store;
    //     $store->nama_store = $request->nama_store;
    //     $store->description_store = $request->description_store;
    //     $store->address=$request->address;
    //     $store->phone=$request->phone;

    
    //     // Save the store first to get the store_id
    //     $store->save();
    
    //     // Set the store_id for the product
    //     $product->store_id = $store->id;
    
    //     // Handle image upload
    //     $image = $request->image;
    //     $imagename = time() . '.' . $image->getClientOriginalExtension();
    //     $request->image->move('product', $imagename);
    //     $product->image = $imagename;
    
    //     // Save the product
    //     $product->save();
    
    //     return redirect()->back()->with('message', 'Product Added Successfully');
    // }
    
    public function add_product(Request $request){
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
    public function show_product(Request $request){
        // $product = new product;
        // $product->title=$request->title;
        // $product->description=$request->description;
        // $product->price=$request->price;
        // $product->quantity=$request->quantity;
        // $product->discount_price=$request->discount_price;
        // $product->category=$request->category;

        // $image=$request->image;
        // $imagename = time().'.'.$image->getClientOriginalExtension();  
        // $request->image->move('product', $imagename);  
        // $product->image=$imagename;
           
        // $product->save();
        // return redirect()->back()->with('message', 'Product Added Successfully');

        $data =product::all();
        
        
        return view('admin.show_product', compact('data'));
    }
    public function update_productadmin($id){

        $data =product::find($id);
        $category=category::all();
        $store = store::find($id);


        // $data =product::all();

        return view('admin.update_product',compact('data','category','store'));

    }
    public function deleteproducttoko($id){

        $data =product::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Product Deleted Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }
    public function update_product_confirm(Request $request , $id){

        $data =product::find($id);
        $category=category::all();
        $store=store::find($id);

        // $data=new product;
       
        
        $data->title=$request->title;
        
        $data->price=$request->price;
        
        $data->category=$request->category;
        
        $data->discount_price=$request->discount_price;
        
        $data->description=$request->description;
        
        $data->quantity=$request->quantity;
        $data->store_id=$request->store_id;
        
        $image=$request->image;
        
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
        
            $request->image->move('product', $imagename);
            
            $data->image=$imagename;
        
        }
        $store->nama_store=$request->nama_store;
        $store->description_store=$request->description_store;
        
       

        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'Product Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function order(){

        $order=order::all();
        return view('admin.order',compact('order'));
    }
    public function delivered($id){
        $order = order::find($id);
        $order->delivery_status="Sedang Dalam Pengantaran";
        $order->payment_status="Sudah Bayar";
        $order->save();
    
        return redirect()->back();
    
    }
    public function user(){
        $data =user::all();
        
        
        return view('admin.showuser', compact('data'));
    
    }
    // showtoko
    public function update_user($id){

        $data =user::find($id);
        // $category=category::all();
        // $store = store::find($id);


        // $data =product::all();

        return view('admin.update_user',compact('data'));

    }
    public function update_user_confirm(Request $request , $id){

        $data =user::find($id);
        // $category=category::all();
        // $store=store::find($id);

        // $data=new product;
       
        
        $data->name=$request->name;
        
        $data->email=$request->email;
        
        $data->phone=$request->phone;
        
        $data->address=$request->address;


        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'User Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function deleteuser($id){

        $data =user::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'User Deleted Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }
    public function showtokoadmin(){
        $data =store::all();
        
        
        return view('admin.showtokoadmin', compact('data'));
    
    }
    public function update_tokoadmin($id){

        $data =store::find($id);
        // $category=category::all();
        // $store = store::find($id);


        // $data =product::all();

        return view('admin.update_tokoadmin',compact('data'));

    }
    public function update_toko_confirm(Request $request , $id){

        $data =store::find($id);
        // $category=category::all();
        // $store=store::find($id);

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
        
        }


        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'User Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    // public function deletetokoadmin($id){

    //     $data =store::find($id);
        

    //     $data->delete();

    //     // return redirect()->back()->with('message','Product Deleted Successfully');;
    //     return redirect()->back()->with('message', 'User Deleted Successfully');

    //     // return view('admin.deleteproduct',compact('data'));

    // }
    public function deletetokoadmin($id)
{
    $store = Store::find($id);

    // Hapus terlebih dahulu produk yang terkait dengan toko ini
    $store->products()->delete();

    // Kemudian baru hapus toko
    $store->delete();

    return redirect()->back()->with('message', 'User Deleted Successfully');
}

}
