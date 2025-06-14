<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contactus;
use Session;

use Stripe;
class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $user=user::all()->count();
            $contactus=contactus::all()->count();
            $order=order::all()->count();
            $product=product::all()->count();
            return view('admin.home',compact('user','contactus','order','product'));
        }else{

            $data=product::paginate(6);
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count'));
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $data=product::paginate(6);
            return view('user.home',compact('data'));
        }
    }
        
    public function about()
    {
        $user = auth()->user();
        $count = $user ? cart::where('phone', $user->phone)->count() : 0; 
    
        return view('user.about', compact('count'));
    }
    
    public function contact()
    {
        $user = auth()->user();
        $count = $user ? cart::where('phone', $user->phone)->count() : 0;
    
        return view('user.contact', compact('count'));
    }
    
    public function our()
    {
        if (Auth::check()) { // Check if user is logged in
            $usertype = Auth::user()->usertype;
    
            if ($usertype == '1') {
                $count = cart::where('phone', Auth::user()->phone)->count();
                return view('user.our', compact('count'));
            }
        }
    
        // If user is not authenticated or usertype is not '1'
        $data = Product::paginate(6);
        $user = auth()->user();
    
        // Handle guest users (when $user is null)
        $count = $user ? cart::where('phone', $user->phone)->count() : 0;
    
        return view('user.our', compact('data', 'count'));
    }
    
    public function search(Request $request){
        $search = $request->search;
    
        if ($search == '') {
            $data = Product::paginate(6);
        } else {
            $data = Product::where('title', 'LIKE', '%' . $search . '%')->get();
        }
    
        // Check if user is logged in before accessing phone number
        $user = Auth::user();
        $count = $user ? Cart::where('phone', $user->phone)->count() : 0;
    
        return view('user.home', compact('data', 'count'));
    }
    
    public function add_card(Request $request,$id){
       if(Auth::id()){
        $user=auth()->user();
        $product=product::find($id);
        $cart=new Cart;
        $cart->name=$user->name;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->product_title=$product->title;
        $cart->price=$product->price;
        $cart->quantity=$request->quantity;
        $cart->save();
        return redirect()->back()->with('message', 'Add to card successfully!');
       }else{
        return redirect('login');
       }
    }
    public function show_cart(){
        $user=auth()->user();
        $cart=cart::where('phone',$user->phone)->get();
        $count=cart::where('phone',$user->phone)->count();
        return view('user.show_cart',compact('count','cart'));
    }
    public function delete_cart($id){
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'remove cart successfully!');
    }
    public function order(Request $request){
       $user=auth()->user();
       $name=$user->name;
       $phone=$user->phone;
       $address=$user->address;
        
       foreach($request->productname as $key=>$productname){
            $order=new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='not delivered';
            $order->save();
            
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message', ' Order successfully!');
    }
    public function post_message(Request $request){
        $data=new contactus;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->save();
        return redirect()->back()->with('message', ' send message successfully!');

    }
    public function stripe($total)

    {

        return view('user.stripe',compact('total'));

    }
    public function stripePost(Request $request, $total)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        \Stripe\Charge::create([
            "amount" => $total * 100, // Amount in cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Sixteen Clothing - Order Payment"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
    
}
