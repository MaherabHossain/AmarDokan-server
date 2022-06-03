<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // all orders for admin dashboard
    public function index()
    {
        $data['orders'] = Order::all();

        // return $order[0]->user;

        
        
        // return $orders;
       return view('Home.orders.index',$data);
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

    public function singleOrder(Request $request){

        $id = $request->user()['id'];

        $user = User::findOrFail($id);
        
         return response()->json(
            $user->order, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = $request->user()['id'];
        
        $data = [
            "user_id" => $request->user()['id'],
            "cart" => $request->cart,
            "note" => $request->note,
            "address" => $request->address,
            "phone_number"=>$request->phone_number,
            "paymentNumber"=>$request->paymentNumber,
            "trxId" => $request->trxId,
            "total" => $request->total,
            "name"=>$request->name,
            "email"=> $request->email,
            "payment_method" => $request->payment_method, 
        ];
        // return $data['payment_method'];
        //  return response()->json($data['name'], 500);
        if(Order::create($data)){
            return response()->json(['code' => '200', 'message' => 'Order placed successfully'],200);
        }else{
            return response()->json(['code' => '500', 'message' => 'something went wrong!'],500);
        }
        // $order = new Order();
        // $order->user_id = $request->user_id;
        // $order->cart = $request->cart;
        // $order->note = $request->note;
        // $order->address = $request->address;
        // $order->phone_number = $request->phone_number;
        // $order->number = $request->number;
        // $order->total = $request->total;
        // $order->trxId = $request->trxId;
        // if($order->save()){
        //     return response()->json(['code' => '200', 'message' => 'product placed successfully']);
        // }else{
        //      return response()->json(['code' => '500', 'message' => 'something went wrong!']);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $data['order'] = Order::findOrfail($id);
        $data['cart'] = json_decode($data['order']->cart);
        return view('Home.orders.details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = $request->status;

        $order = Order::findOrfail($id);

        $order->status = $status;

        if($order->save()){
            Session::flash('message','Order updated Successfully!');
        }
        return redirect('orders/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order->delete()){
            Session::flash('message','Order deleted Successfully!');
        }
        return redirect()->to('orders');
    }
}
