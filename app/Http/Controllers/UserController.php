<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $formData['email'] = $request->email;  
        $formData['password'] = $request->password;

        //  return  $request->email;
         
        if($request->email && $request->password){
        //    work here
        if(!Auth::attempt(['email'=>$formData['email'],'password'=>$formData['password']])){
            return response()->json(['email'=>$formData['email'],'password'=>$formData['password']],500 );
        }else{
            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message'=>"log in successfully!",'token'=>$token,'name'=>$user->name,'email'=>$user->email],200 );


        }

        }else{
            return response()->json(['error'=>"validation error"],400 );
        }
    }

    public function logout(Request $request)
    {
        if($request->user()->currentAccessToken()->delete()){
            return response()->json(['message'=>"logout successfully!",],200 );
        }else{
            return response()->json(['error'=>"server side error!!",],500 );
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData['name'] = $request->name;
        $formData['email'] = $request->email;
        
        $formData['password'] = Hash::make($request->password);

         
         
        if($request->name && $request->email && $request->password){
           if(User::create($formData)){
            return response()->json(['messsage'=>"user created successfully"],200 );
           }else{
            return response()->json(['error'=>"server side problem!"],403 );
           }
        }else{
            return response()->json(['error'=>"validation error"],400 );
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
