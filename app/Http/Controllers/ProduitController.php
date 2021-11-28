<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Category;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::with('user')->paginate(20);
        return view('dashboard.produits.index', ['produits' => $produits  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.produits.create', ['categories' => $categories  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'description'       => 'required',
            'price'             => 'required',
            'category_id'       => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $product = new Produit();
        $user = auth()->user();
        $product->title     = $request->input('title');
        $product->description   = $request->input('description');
        $product->price   = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->users_id = $user->id;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/produits';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $product->image = "$filename";

            $product->save();
            $request->session()->flash('message', 'Successfully created product');
        }
       
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Produit::with('user')->find($id);
        return view('dashboard.produits.show', [ 'product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Produit::find($id);
        $categories = Category::all();
        return view('dashboard.produits.edit', [ 'categories' => $categories, 'product' => $product ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'description'       => 'required',
            'price'             => 'required',
            'category_id'       => 'required',
            
        ]);
        $product = Produit::find($id);
        $product->title     = $request->input('title');
        $product->description   = $request->input('description');
        $product->price   = $request->input('price');
        $product->category_id = $request->input('category_id');
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/produits';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $product->image = "$filename";           
        }
        
        $product->save();
        $request->session()->flash('message', 'Successfully updated product');
       
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produit::find($id);
        if($product){
            $product->delete();
        }
        return redirect()->route('produits.index');
    }
}
