<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slide;
use App\Category;
use App\Product;
use App\User;
use App\Order;
use App\OrderDetail;
use Cart;
use Session;
use Mail;
use DB;

class PageController extends Controller
{

    public function homepage()
    {
        $slides = Slide::all();
        $hotCake = Product::orderBy('promote_price', 'DESC')->take(4)->get();
        $newCake = Product::orderBy('created_at', 'DESC')->take(4)->get();
        return view('frontend.pages.homepage',compact('hotCake', 'slides','newCake'));
    }

    public function allProduct()
    {
        $products = Product::paginate(6);
        return view('frontend.pages.allproduct', compact('products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->paginate(6);
        return view('frontend.pages.category', compact('products'));
    }

    public function product($id)
    {
        $products = Product::where('id', $id)->get();
        return view('frontend.pages.product',compact('products'));
    }
    //Function for Cart
    public function getAddToCart($id)
    {
        $product = Product::where('id', $id)->first();
        $cart = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1,
                    'price' => $product->promote_price == 0 ?   $product->unit_price : $product->promote_price ,
                    'options' => ['image' => $product->image]]);
        return redirect()->back();
    }

    public function getAddToCartWithQty(Request $request,$id)
    {
        $qty = $request->qty;
        $product = Product::where('id', $id)->first();
        $cart = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => $qty,'price' => $product->promote_price == 0 ?   $product->unit_price : $product->promote_price ,'options' => ['image' => $product->image]]);
        return redirect()->back();
    }

    public function getDeleteItemCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function getViewCart()
    {
        return view('frontend.pages.cart');
    }

    public function changeQty(Request $request)
    {
        if ($request->ajax()){
            $id = $request->get('id');
            $qty = $request->get('qty');
            Cart::update($id, $qty);
            echo 'ok';
        }
    }
    public function getSearch(Request $request){
        $products = Product::orderBy('promote_price', 'ASC')
                    ->where('name','like','%'.$request->key.'%')
                    ->paginate(6)->appends(['key'=> $request->key]);
        return view('frontend.pages.search',compact('products'));
    }

    public function userProfile()
    {
        return view('frontend.users.profile');
    }

    public function changeUserProfile(Request $request, $id)
    {
        request()->validate([
            'email' => 'email',
            'confirm_password' => 'same:password'
            ]);
        $user = User::find($id);
        $user->password = $request->password;
        $user->update($request->all());
        return redirect()->back()->with('notification','Your profile is saved');
    }

    public function userOrder()
    {
        $orders= Auth::user()->orders;
        return view('frontend.users.order', compact('orders'));
    }

    public function deleteOrder($id)
    {
        $orders= Auth::user()->orders;
        $orderDetails = OrderDetail::all();
        foreach ($orderDetails as $orderDetail)
        {
            if ( !$orderDetail->isCommittedToOrders() )
            {
                $orderDetail->delete();
            }
        }

        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', $order->id)->get();
        $user = User::find($order->user_id);
        foreach ($order_details as $detail) {
            $product = Product::find($detail->product_id);
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'productName' => $product->name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
            ];
        }
        Mail::send('emails.delete-order-user', $data, function($message) use ($data){
            $message->to('dovietlam94@gmail.com');
            $message->subject('Order of the user was deleted');
        });
        Order::destroy($id);
        return redirect('user/order')->with('notification','Your order deleted successfully');
    }

    public function getFillter(Request $request, $id)
    {
            $minPriceUnit = $request->minimum_price .'000';
            $minPrice = $request->minimum_price;
            $maxPriceUnit = $request->maximum_price .'000';
            $maxPrice = $request->maximum_price;
            if ($id == 0){
                $products = DB::table('products')
                ->whereBetween('unit_price', [$minPriceUnit, $maxPriceUnit])->orderBy('unit_price', 'ASC')
                ->paginate(6)->appends(['minimum_price'=> $minPrice, 'maximum_price' => $maxPrice]);
                return view('frontend.pages.fillter',compact('products','minPrice', 'maxPrice'));
            }
                $products = DB::table('products')->where('category_id', $id)->whereBetween('unit_price', [$minPriceUnit, $maxPriceUnit])->orderBy('unit_price', 'ASC')->paginate(6)->appends(['minimum_price'=> $minPrice, 'maximum_price' => $maxPrice]);
                return view('frontend.pages.fillter',compact('products','minPrice', 'maxPrice'));

    }

    public function getContact()
    {
        return view('frontend.pages.contact');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
        ]);
        $input = $request->all();
        // send mail admin
        Mail::send('emails.admin-email', array('name' => $input["name"],'email' => $input["email"], 'content' => $input['content']), function($message){
            $message->to('dovietlam94@gmail.com', 'Visitor')->subject('Contact information');
        });
        //send mail user
        $data = [
            'name' =>$request->name,
            'email' =>$request->email,
            'content' =>$request->content
        ];
        // dd($data['email']);
        Mail::send('emails.user-email', $data, function($message) use ($data){
            $message->from('dovietlam94@gmail.com', 'Vanila Bakery Admin');
            $message->to($data['email']);
            $message->subject('Contact feedback');
        });
        return redirect()->back()->with('notification', 'Your contact information send successfully!');
    }

    public function termAndConditions()
    {
        return view('frontend.pages.term');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }
}
