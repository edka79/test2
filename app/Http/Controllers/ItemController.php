<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $item = new Item([
          'name' => $request->get('name'),
          'description' => $request->get('description'),
          'status' => $request->get('status'),
          'user_id' => Auth::id()
        ]);
        $item->save();
        return response()->json('Successfully added');
    }

    public function edit($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->status = $request->get('status');
        $item->user_id = Auth::id();
        $item->save();

        return response()->json('Successfully Updated');
    }
 
    public function destroy($id)
    {
      $item = Item::find($id);
      $item->delete();

      return response()->json('Successfully Deleted');
    }
}