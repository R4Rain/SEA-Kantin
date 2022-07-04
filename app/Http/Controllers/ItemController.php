<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Canteen;

class ItemController extends Controller
{
    public function index()
    {
        return view('items', [
            'title' => 'Browse Items',
            'items' => Item::filter(request(['search', 'select']))->paginate(8)->withQueryString()
        ]);
    }
    public function show(Item $item)
    {
        return view('item', [
            'title' => $item->name,
            'item' => $item
        ]);
    }
    public function buy(Item $item, Request $request)
    {
        if ($request['buy'] === 'buyed') {
            $balance_now = Canteen::first()->balance;
            Canteen::first()->update([
                'balance' => $balance_now + $item->price
            ]);
            Item::where('id', '=', $item->id)->delete();
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
    public function showMyItem()
    {
        return view('myitems', [
            'title' => "My Items",
            'items' => Item::where('user_id', '=', auth()->user()->id)->filter(request(['search', 'select']))->paginate(8)->withQueryString()
        ]);
    }
    public function showCreate()
    {
        return view('create', [
            'title' => "Create item",
        ]);
    }
    public function storeItem(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:1',
            'image' => 'image|file|max:2048',
            'description' => 'required'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        } else {
            $validatedData['image'] = null;
        }
        $validatedData['user_id'] = auth()->user()->id;
        Item::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'user_id' => $validatedData['user_id']
        ]);
        return redirect('/my-items')->with('success', 'New item has been added!');
    }
}
