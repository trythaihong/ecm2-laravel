<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\contactus;
class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    }
    public function upload_product(Request $request)
    {
        $data = new Product(); // Assuming "Product" is the model
        $image = $request->file('file'); // Use $request->file('file') to get the uploaded file
    
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productimage'), $imagename);
            $data->image = $imagename;
        }
    
        $data->title = $request->title;
        $data->price = $request->price;
        $data->des = $request->des;
        $data->quantity = $request->quantity;
        $data->save();
    
        return redirect()->back()->with('message', 'Product uploaded successfully!');
    }
    public function show_product(){
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }
    public function update_product($id){
        $data=product::find($id);
        return view('admin.update_product',compact('data'));
    }
   
    public function update_product_final(Request $request,$id){
        $data=product::find($id);
        $image = $request->file('file'); // Use $request->file('file') to get the uploaded file
    
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productimage'), $imagename);
            $data->image = $imagename;
        }
    
        $data->title = $request->title;
        $data->price = $request->price;
        $data->des = $request->des;
        $data->quantity = $request->quantity;
        $data->save();

        return redirect()->back()->with('message', 'Product update successfully!');
       
    }
    public function delete_product($id){
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product delete successfully!');
        // return view('admin.showproduct',compact('data'));
    }
    public function showorder(){
        $order=Order::all();
       return view('admin.showorder',compact('order'));
       
    }
    public function delete($id){
        $order=Order::find($id);
        $order->delete();
       return redirect()->back();
       
    }
    public function update_status($id){
        $order=Order::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back();
        
    }
    public function show_message(){
        $data=contactus::all();
        return view('admin.show_message',compact('data'));
        
    }
    public function delete_message($id){
        $data=contactus::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'messsage delete successfully!');
        
    }
    public function alluser(){
        $data=user::all();
        return view('admin.alluser',compact('data'));
        
        
    }
    public function delete_user($id){
        $data=user::find($id);
        $data->delete();
        
        return redirect()->back()->with('message', 'user delete successfully!');
        
    }
    public function update_user($id){
        $data=user::find($id);
        
        return view('admin.update_user',compact('data'));
    
        
    }
    public function edit_userid(Request $request,$id)
    {
        $data=user::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->usertype = $request->usertype;
        $data->save();
    
        return redirect()->back()->with('message', 'user update successfully!');
    }
}
