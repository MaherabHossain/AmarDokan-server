<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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

        

        //return $data;
        
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

    public function singleOrder($id){

       

        $orders = Order::where('user_id', '=', $id)->get();
       
        
        $response = array(
            "success" => true,
            "data" => $orders
        );

       
        
        return response()->json(['success'=>true, 'message' => 'Order placed successfully','data'=>[
            'success'=>true,
            'data'=>$orders
        ]],200);
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
            "user_id" => $request->user_id,
            "name"=>$request->name,
            "email"=> $request->email,
            "note" => $request->note,
            "address" => $request->address,
            "phone_number"=>$request->phone_number,
            "payment_method"=>$request->payment_method,
            "quantity" => $request->quantity,
            "cash_app_tag" => $request->cash_app_tag,
            "payment_status" => "pending",
            "order_status" => $request->order_status,
            "amount" => $request->amount,
            "product_id" => $request->product_id,
        ];
        if($data['payment_method']=="Cash App" && Str::length($data['cash_app_tag'])==0){
            return response()->json(['success'=>false, 'message' => 'something went wrong!'],500);
        }
        // return $data;
        // return $data['payment_method'];
        //  return response()->json($data['name'], 500);
        if(Order::create($data)){
            return response()->json(['success'=>true, 'message' => 'Order placed successfully','data'=>$data],200);
        }else{
            return response()->json(['success'=>false, 'message' => 'something went wrong!'],500);
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
