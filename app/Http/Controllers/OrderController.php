<?php

namespace App\Http\Controllers;

use App\order;
use App\cart;   
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $orders = order::with('users')->where('user_id',$user_id)->orderBy('o_id','DESC')->get();
        return view('order_list',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $input= order::create([
            'u_name' => $request['u_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
          'total' => 200,
            'address' => $request['address'],
            'user_id' => $user_id,
        ]);
        $o_id=order::orderBy('o_id', 'DESC')->first();
        $order_id=  $o_id->o_id;
        $cart = session()->get('cart');

         // insert in cart
         foreach($cart as  $detail){
            $cart_model = new cart;
            $cart_model->p_id = $detail['id'];
            $cart_model->name = $detail['name'];
            $cart_model->price = $detail['price'];
            $cart_model->quantity = $detail['quantity'];
            $cart_model->image = $detail['image'];
            $cart_model->total = $detail['quantity'] * $detail['price'] ;
            $cart_model->o_id = $order_id;
            $cart_model->save();
        }
        session()->forget('cart');
        return redirect('/')->with('massage','Order Submit Successfull ');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $view_cart=cart::where('o_id',$id)->get();
        $sum = cart::select('total')->where('o_id',$id)->sum('total');
        return view('view_order',compact('view_cart','sum'));
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::where('o_id', $id);
        $order->delete();
        return redirect()->back();
    }
}
