<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knife;

class KnifeController extends Controller
{
   
    public function index()
    {
        $knives = Knife::all();
        return view('knives.index', ['knives' => $knives]);
    }

    
    public function create()
    {
        return view('knives.create');  
    }

   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('knives', 'public');
            $validated['image'] = $path;
        }

       
        Knife::create($validated);

      
        return redirect('/knives')->with('success', 'Нож успешно добавлен!');
    }

    
    public function addToCart($id)
{
    $knife = Knife::findOrFail($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $knife->name,
            'price' => $knife->price,
            'quantity' => 1
        ];
    }

    session(['cart' => $cart]);

    return redirect()->route('knives.index')->with('success', 'Нож добавлен в корзину!');
}

    
    public function showCart()
    {
        $cartIds = session('cart', []);
        $cart = Knife::whereIn('id', array_keys($cartIds))->get(); 
    
        return view('knives.cart', compact('cart'));
    }
    
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
    
        return redirect()->route('knives.cart')->with('success', 'Нож удален из корзины');
    }
    
}


