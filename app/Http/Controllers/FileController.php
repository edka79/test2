<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
      public function index(){
        return view('welcome');
      }
    
      public function upload(Request $request){
            
            $request->validate([
               'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
            ]);  
           
    
            if($request->file()) {
               $file_name = time().'_'.$request->file->getClientOriginalName();
               $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');   
               
               $user = Auth::user();
               $user->avatar = '/storage/' . $file_path;
               $user->save();
    
               return response()->json(['success' => '/storage/' . $file_path ]);
            }
       }
}