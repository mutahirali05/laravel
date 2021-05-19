<?php

namespace App\Http\Controllers;

use App\cart;
use App\product;
use Illuminate\Http\Request;

class CartController extends Controller
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
        $cart=session()->get('cart');
        return view('cart'); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function addtocart($id)
    {
        $products=Product::find($id);
        $cart=session()->get('cart');
        if(!$cart)
        {
            $cart=[
                $id=>[
                    'id'=>$products->id,
                    "name"=>$products->name,
                    "quantity"=>1,
                    "image"=>$products->image,
                    "price"=>$products->price,
                    
            ]
                ];
                session()->put('cart',$cart);   
                return redirect()->back()->with('massage','Cart Update Successfully ');
        }
            if(isset($cart[$id]))
            {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return redirect()->back()->with('massage','Cart Update Successfully ');
            }
            $cart[$id]=[
                'id'=>$products->id,
                'name'=>$products->name,
                'quantity'=>1,
                'price'=>$products->price,
                'image'=>$products->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('massage','Cart Update Successfully ');
        }
  

        public function UpdateQuantity(Request $request)
        {
            
            $count = count($request->p_id);
      for($i=0;$i<$count;$i++)
      {
        $p_id = $request->p_id[$i];
        $p_quantity = $request->quantity[$i];
        $cart = session()->get('cart');
        if(isset($cart[$p_id])) {
          $cart[$p_id]['quantity'] = $p_quantity;
         session()->put('cart', $cart);
        }
      }
        return redirect()->back();
        
        }

}
