<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class products extends Controller
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
        $products = product::all();
       return view("products_list",compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add_products");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input =  $request->all();
      $imageName =$request->image->getClientOriginalName(); 
      $request->image->move(public_path('images'), $imageName);
        $data = ['name'=>$request->name,'price'=>$request->price,'image'=> $imageName];
        product::create($data);
        return redirect('/')->with('massage','Product Add Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $prodata = product::find($id);
       return view('edit_product',compact('prodata'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id=$request->id;
if($request->image == null)
{
       $data = ['name'=>$request->name,'price'=>$request->price];
       product::where('id',$id)->update($data);
    }
else
{

       $imageName =$request->image->getClientOriginalName(); 
       $request->image->move(public_path('images'), $imageName);
       $data = ['name'=>$request->name,'price'=>$request->price,'image'=> $imageName];
       product::where('id',$id)->update($data);


    }
    return redirect("/")->with('massage','Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $pro = product::where('id', $id);
        $pro->delete();
        return redirect('/')->with('massage','Product Delete Successfully ');
    }
   

    public function checkout()
    {
        if( session()->has('cart'))
        {

        
        $grandtotal = 0;
       session()->get('cart');
       foreach(session('cart') as $id => $details){
       $total =  $details['quantity'] * $details['price'];
       $grandtotal += $total;
       }
      
    }
    else
    {
        $grandtotal = 0;
    }
       return view('checkout',compact('grandtotal')); 	
    }
}
