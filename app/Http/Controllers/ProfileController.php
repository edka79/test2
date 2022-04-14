<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function fields()
    {
        $items = User::select('name', 'email', 'fullname', 'phone', 'rank', 'telegram', 'whatsapp', 'status')->where( 'id', Auth::id())->get();
        return response()->json($items);        
    }   

    public function userinfo()
    {
        $items = User::select('name', 'fullname', 'avatar')->where( 'id', Auth::id())->get();
        return response()->json($items);
    }  

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);

        $item = User::find( Auth::id() );        
        $item->name = $request->get('name');
        $item->email = $request->get('email');
        $item->fullname = $request->get('fullname');
        $item->phone = $request->get('phone');
        $item->rank = $request->get('rank');
        $item->telegram = $request->get('telegram');
        $item->whatsapp = $request->get('whatsapp');
        $item->status = $request->get('status'); 
        $item->save();

        return response()->json('Successfully Updated');
    }

    public function avatar()
    {
        return view('profile');
    }
    
}